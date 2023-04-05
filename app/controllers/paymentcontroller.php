<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/ticketorderservice.php';
require_once __DIR__ . '/../services/eventservice.php';

class PaymentController extends Controller
{
    private $orderService;
    private $ticketOrdeService;
    private $eventService;
    private $mollie;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->ticketOrdeService = new TicketOrderService();
        $this->eventService = new EventService();
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
                "redirectUrl" => "https://9cc3-87-209-230-169.eu.ngrok.io/payment/paymentStatus",
                "webhookUrl" => " https://9cc3-87-209-230-169.eu.ngrok.io/payment/handleWebhook",
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
            // Handle API exception
            // You can log the error message or show an error page to the user
            echo 'Error: ' . htmlspecialchars($e->getMessage());
        }
    }

    public function paymentStatus()
    {

        try {
            $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
            switch ($order->getStatus()) {
                case 'paid':
                    echo 'Thank you for your payment.';
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
            // Handle API exception
            // You can log the error message or show an error page to the user
            echo 'Error: ' . htmlspecialchars($e->getMessage());
        }
    }

    public function insertOrderItems()
    {
        $order = $this->orderService->getOrderByPaymentId($_SESSION['paymentid']);
        $cart = $_SESSION['cart'];
        foreach ($cart as $productid => $quantity) {
            $ticketOrder = new TickerOrder();
            $ticketOrder->setOrderId($order->getId());
            $ticketOrder->setTicketId($productid);
            $ticketOrder->setQRCode("qrcode ");
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
            $amount += $item->getPrice();
        }
        return $amount;
    }

    public function qrcode(){
        require __DIR__ . '/../views/payment/qrcode.php';
    }
}

?>