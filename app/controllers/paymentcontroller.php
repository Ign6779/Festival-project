<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';

class PaymentController extends Controller
{
    private $orderService;
    private $mollie;

    public function __construct()
    {
        $this->orderService = new OrderService();
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
            $amount = 20.35;
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

            $order = new Order();
            $order->setUserId($userId);
            $order->setAmount($amount);
            $order->setStatus('pending');
            $order->setPaymentMethod($paymentMethod);
            $order->setTimeOfPurchase(date('Y-m-d H:i:s'));
            $order->setPaymentId($payment->id);
            $this->orderService->createOrder($order);

            $_SESSION['paymentid'] = $payment->id;

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

    
}

?>