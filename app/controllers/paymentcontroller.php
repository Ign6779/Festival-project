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
        $_SESSION['paymentid'] = null;
        if (isset($_GET['token'])) {
            $order = $this->orderService->getOrderByToken(htmlentities($_GET['token']));
            $_SESSION['user'] = $order->getUserId();
            $_SESSION['paymentid'] = $order->getPaymentId();
            $orderItems = $this->ticketOrdeService->getItemsByOrderId($order->getId());
            $cart = array();
            foreach ($orderItems as $orderItem) {
                $id = $orderItem->getTicketId();
                if (in_array($id, array_keys($cart))) {
                    $cart[$id] += 1;

                } else {
                    $cart[$id] = 1;
                }
            }
            $_SESSION["cart"] = $cart;
        }
        require __DIR__ . '/../views/payment/payment.php';
    }

    public function processPayment()
    {
        try {
            $paymentMethod = $_POST['paymentMethod'];
            $userId = $_SESSION['user'];
            $amount = $this->totalAmount();
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

            if (!isset($_SESSION['paymentid'])) {
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
            } else {
                $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
                $order->setPaymentId($payment->id);
                $this->orderService->updateOrder($order);
                $_SESSION['paymentid'] = $payment->id;
            }
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
        include __DIR__ . '/../views/header.php';
        try {
            $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
            $user = $this->userService->getUserById($order->getUserId());
            switch ($order->getStatus()) {
                case 'paid':
                    $order->setToken(null);
                    $this->orderService->updateOrder($order);
                    $this->sendInvoiceAndTickets($order, $user);
                    $message = "Thank you for your payment. An email has been sent succesfully with your invoice and tickets.";
                    include __DIR__ . '/../views/messages/success.php';
                    break;
                case 'cancelled':
                    $message = 'Your payment has been cancelled.';
                    include __DIR__ . '/../views/messages/error.php';
                    break;
                case 'failed':
                    $this->payLater($order, $user);
                    $message = 'Your payment has failed.';
                    include __DIR__ . '/../views/messages/error.php';
                    break;
                default:
                    $message = 'Unknown payment status: ' . $order->getStatus();
                    include __DIR__ . '/../views/messages/warning.php';
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
            for ($i = 0; $i < $quantity; $i++) {
                $ticketOrder = new TicketOrder();
                $ticketOrder->setOrder($order);
                $ticketOrder->setEvent($this->eventService->getById($productid));
                $ticketOrder->setUuId(Uuid::uuid4()->toString());
                $ticketOrder->setIsScanned(false);
                $this->ticketOrdeService->insertOrderTicket($ticketOrder);
            }

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

    public function sendInvoiceAndTickets($order, $user)
    {
        try {
            $pdf_ticket = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf_ticket->SetCreator(PDF_CREATOR);
            $pdf_ticket->SetAuthor('Haarlem festival');
            $pdf_ticket->SetTitle('Tickets');
            $pdf_ticket->SetSubject('Tickets');
            $pdf_ticket->SetKeywords('TCPDF, PDF, invoice, order, tickets');
            $orderItems = $this->ticketOrdeService->getItemsByOrderId($order->getId());
            $this->createTicketsTemplate($pdf_ticket, $orderItems);
            $pdf_file_ticket = tempnam(sys_get_temp_dir(), 'pdf');
            $pdf_ticket->Output($pdf_file_ticket, 'F');
            $pdfInvoice = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdfInvoice->SetCreator(PDF_CREATOR);
            $pdfInvoice->SetAuthor('Haarlem festival');
            $pdfInvoice->SetTitle('Invoice');
            $pdfInvoice->SetSubject('Invoice');
            $pdfInvoice->SetKeywords('TCPDF, PDF, invoice, order, items');
            $this->createInvoiceTemplate($pdfInvoice, $user, $order);
            $pdf_file_invoice = tempnam(sys_get_temp_dir(), 'pdf');
            $pdfInvoice->Output($pdf_file_invoice, 'F');
            $mail = new PHPMailer(true);
            $this->configureEmail($mail, $user);
            $mail->Subject = "Invoice";
            $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Here is your order<br><br>Thank you,<br>Haarlem festival';
            $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\Here is your order\n\nHere is your order\n\nThank you,\nHaarlem festival';
            $mail->addAttachment($pdf_file_invoice, 'invoice.pdf');
            $mail->addAttachment($pdf_file_ticket, 'Tickets.pdf');
            $mail->send();
        } catch (Exception $e) {
            echo "Something went wrong, try agin later.";
        }
    }

    function createInvoiceTemplate($pdf, $user, $order)
    {
        $cart = $_SESSION["cart"];
        $pdf->SetMargins(15, 15, 15);
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', 'B', 16);
        $pdf->Cell(0, 15, 'Invoice', 0, 1, 'C');
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 10, 'Invoice Number: ' . $order->getId(), 0, 1);
        $pdf->Cell(0, 10, 'Invoice Date: ' . date('Y-m-d'), 0, 1);
        $pdf->Cell(0, 10, 'Name: ' . $user->getUsername(), 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $user->getEmail(), 0, 1);
        $pdf->Cell(0, 10, 'Phone Number: ' . $user->getPhone(), 0, 1);
        $pdf->Cell(0, 10, 'Address: ' . $user->getAddress(), 0, 1);
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell(0, 10, 'Invoice Items:', 0, 1);
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell(140, 10, 'Item Title', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Quantity', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Price', 1, 1, 'C');
        $pdf->SetFont('dejavusans', '', 12);
        $total = 0;
        foreach ($cart as $itemId => $quantity) {
            $event = $this->eventService->getById($itemId);
            $pdf->Cell(140, 10, $event->getTitle(), 1, 0);
            $pdf->Cell(20, 10, $quantity, 1, 0, 'C');
            $pdf->Cell(20, 10, '€' . number_format($event->getPrice() * $quantity, 2), 1, 1, 'C');
            $total += $event->getPrice() * $quantity;
        }
        $pdf->SetFont('dejavusans', 'B', 12);
        $vatRate = 1.21;
        $totalWithVat = $total * $vatRate;
        $pdf->Cell(120, 10, 'Total(inc VAT):', 0, 0, 'R');
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(60, 10, '€' . number_format($totalWithVat, 2), 0, 1, 'C');
    }

    function createTicketsTemplate($pdf, $orderItems)
    {
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 10, 'Here is ur Ticket', 0, 1);
        $y = 15;
        foreach ($orderItems as $orderItem) {
            if ($y + 60 > $pdf->getPageHeight()) {
                $pdf->AddPage();
                $y = 10; // Reset Y position to top of page
            }
            // Generate QR code
            $qrCodeData = "https://44df-145-81-199-236.ngrok-free.app/scanner?orderUid=" . $orderItem->getUuId();
            $qrCode = Builder::create()
                ->writer(new PngWriter())
                ->writerOptions([])
                ->data($qrCodeData)
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(300)
                ->margin(10)
                ->validateResult(false)
                ->build();
            $event = $this->eventService->getById($orderItem->getEvent()->getId());
            // Save QR code image to a temporary file
            $qrCodeImageFile = tempnam(sys_get_temp_dir(), 'qrcode');
            $qrCode->saveToFile($qrCodeImageFile);
            // Insert QR code image into PDF and content
            $pdf->Image($qrCodeImageFile, 150, $y, 30, 30);
            $pdf->MultiCell(150, 40, 'Ticket: ' . $event->getTitle() . "\nDate: " . $event->getDate() . "\nStart time: " . $event->getStartTime() . " End time: " . $event->getEndTime(), 0, 'L', false, 10, 10);
            $y += 40;
            // Delete QR code image file
            unlink($qrCodeImageFile);
        }
    }

    function configureEmail($mail, $user)
    {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sallah.ag.03@gmail.com';
        $mail->Password = 'vhtlnmijfjhbcgec';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('sallah.ag.03@gmail.com', 'Haarlem festival');
        $mail->addAddress($user->getEmail());
        $mail->isHTML(true);
    }
    function payLater($order, $user)
    {
        $currentTime = time();
        $paymentTime = strtotime($order->getTimeOfPurchase());
        $timeDifference = $currentTime - $paymentTime;
        $timeDifferenceInHours = floor($timeDifference / (60 * 60));
        if ($timeDifferenceInHours <= 24) {
            $token = bin2hex(random_bytes(32));
            $order->setToken($token);
            $this->orderService->updateOrder($order);
            $mail = new PHPMailer(true);
            $this->configureEmail($mail, $user);
            $mail->Subject = "Failed Payment";
            $mail->Body = 'Dear ' . $user->getUsername() . ',<br><br>Your payment has failed please click on this link to pay again. Note you have 24 hours to pay or your order will be cancelled.<br><br>The link: <a href="https://36f6-87-209-230-169.ngrok-free.app/payment?token=' . $token . '">Pay Later</a><br><br>Thank you,<br>Haarlem festival';
            $mail->AltBody = 'Dear ' . $user->getUsername() . ',\n\nYour payment has failed please click on this link to pay again. Note you have 24 hours to pay or your order will be cancelled.\n\nThe link: https://36f6-87-209-230-169.ngrok-free.app/payment?token=' . $token . '\n\nThank you,\nHaarlem festival';
            $mail->send();
        } else {

            $message = 'The payment timeframe has expired.';
            include __DIR__ . '/../views/messages/error.php';
        }

    }
}

?>