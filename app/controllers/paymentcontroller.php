<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Ramsey\Uuid\Uuid;

require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../lib/phpEmaiLib/Exception.php';
require_once __DIR__ . '/../lib/phpEmaiLib/PHPMailer.php';
require_once __DIR__ . '/../lib/phpEmaiLib/SMTP.php';
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/ticketorderservice.php';
require_once __DIR__ . '/../services/eventservice.php';
require_once __DIR__ . '/../services/userservice.php';


class PaymentController extends Controller
{
    private $orderService;
    private $ticketOrdeService;
    private $eventService;
    private $mollie;
    private $userService;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->ticketOrdeService = new TicketOrderService();
        $this->eventService = new EventService();
        $this->userService = new UserService();
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey('test_5qajcu3h8GHTq5CS68PaAWTsNfPpxh');
    }

    public function index()
    {
        require __DIR__ . '/../views/payment/payment.php';
    }

    public function processPayment()
    {
        try {
            // Save order in database with payment status 'pending'
            $userId = $_SESSION['user'];
            $amount = $this->totalAmount();
            $paymentMethod = $_POST['paymentMethod'];
            $payment = $this->mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => number_format($amount, 2, '.', ''),
                ],
                "description" => "Festival ticket payment for user $userId",
                "redirectUrl" => "https://44df-145-81-199-236.ngrok-free.app/payment/paymentStatus",
                "webhookUrl" => "https://44df-145-81-199-236.ngrok-free.app/payment/handleWebhook",
                "metadata" => [
                    "user_id" => $userId,
                ],
                "method" => $paymentMethod,
            ]);
            $_SESSION['paymentid'] = $payment->id;
            $order = new Order();
            $order->setUserId($userId);
            $order->setAmount($amount);
            $order->setStatus('pending');
            $order->setPaymentMethod($paymentMethod);
            $order->setTimeOfPurchase(date('Y-m-d H:i:s'));
            $order->setPaymentId($payment->id);
            $this->orderService->createOrder($order);
            $this->insertOrderItems();
            header("Location: " . $payment->getCheckoutUrl());
            exit;
        } catch (ApiException $e) {
            echo 'Error: ' . htmlspecialchars($e->getMessage());
        }
    }

    public function handleWebhook()
    {
        try {
            // Retrieve Mollie payment
            $payment = $this->mollie->payments->get($_POST['id']);
            // Update order in database with payment status
            $order = $this->orderService->getOrderByPaymentId($payment->id);
            if ($order) {
                $order->setStatus($payment->status);
                $this->orderService->updateOrder($order);
            }
        } catch (ApiException $e) {
            echo 'Error: ' . htmlspecialchars($e->getMessage());
        }
    }

    public function paymentStatus()
    {

        try {
            $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
            $user = $this->userService->getUserById($order->getUserId());
            switch ($order->getStatus()) {
                case 'paid':
                    // echo 'Thank you for your payment.';
                    $this->sendInvoice($order, $user);
                    break;
                case 'cancelled':
                    echo 'Your payment has been cancelled.';
                    break;
                case 'failed':
                    echo 'Your payment has failed.';
                    break;
                default:
                    echo 'Unknown payment status: ' . $order->getStatus();
                    break;
            }

        } catch (ApiException $e) {
            echo 'Error: ' . htmlspecialchars($e->getMessage());
        }
    }

    public function insertOrderItems()
    {
        $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
        $cart = $_SESSION['cart'];
        foreach ($cart as $productid => $quantity) {
            $ticketOrder = new TicketOrder();
            $ticketOrder->setOrderId($order->getId());
            $ticketOrder->setTicketId($productid);
            $ticketOrder->setUuId(Uuid::uuid4()->toString());
            $ticketOrder->setIsScanned(false);
            $this->ticketOrdeService->insertOrderTicket($ticketOrder);
        }
    }

    public function totalAmount()
    {
        $amount = 0;
        $cart = $_SESSION['cart'];
        foreach ($cart as $productid => $qnt) {
            $item = $this->eventService->getById($productid);
            $amount += $item->getPrice() * $qnt;
        }
        return $amount;
    }

    public function qrcode()
    {
        require __DIR__ . '/../views/payment/qrcode.php';
    }

    public function sendInvoice($order, $user)
    {
        try {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Haarlem festival');
            $pdf->SetTitle('My PDF');
            $pdf->SetSubject('TCPDF Tutorial');
            $pdf->SetKeywords('TCPDF, PDF, invoice, order, tickets');
            $pdf->AddPage();
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 10, 'Here is ur order', 0, 1);
            $orderItems = $this->ticketOrdeService->getItemsByOrderId($order->getId());
            $y = 20;
            foreach ($orderItems as $orderItem) {
                // Generate QR code
                $qrCodeData = $orderItem->getId() . "|" . $orderItem->getOrderId(); // Concatenate with a pipe separator
                $qrCode = Builder::create()
                    ->writer(new PngWriter())
                    ->writerOptions([])
                    ->data($qrCodeData) // Use the concatenated data
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                    ->size(300)
                    ->margin(10)
                    ->validateResult(false)
                    ->build();

                // Save QR code image to a temporary file
                $qrCodeImageFile = tempnam(sys_get_temp_dir(), 'qrcode');
                $qrCode->saveToFile($qrCodeImageFile);
                // Insert QR code image into PDF with updated y-coordinate
                $pdf->Image($qrCodeImageFile, 150, $y + 5, 30, 30);
                // Add QR code data and ticket ID to PDF content with updated y-coordinate
                $pdf->Cell(100, $y, 'Ticket ID: ' . $orderItem->getTicketId() . ' | QR Code Data: ' . $qrCodeData, 0, 1, 'L', false, 10, $y);
                $y += 40;
                // Delete QR code image file
                unlink($qrCodeImageFile);
            }
            $pdf_file = tempnam(sys_get_temp_dir(), 'pdf');
            $pdf->Output($pdf_file, 'F');
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sallah.ag.03@gmail.com';
            $mail->Password = 'vhtlnmijfjhbcgec';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('haarlemfestival2023@gmail.com', 'Haarlem festival');
            $mail->addAddress($user->getEmail());
            $mail->isHTML(true);
            $mail->Subject = "Invoice";
            $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Here is your order<br><br>Thank you,<br>Haarlem festival';
            $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\Here is your order\n\nHere is your order\n\nThank you,\nHaarlem festival';
            $mail->addAttachment($pdf_file, 'Invoice.pdf');
            $mail->send();
            echo "The email has been sent succesfully.";
        } catch (Exception $e) {
            echo "Something went wrong, try agin later.";

        }
    }
}

?>