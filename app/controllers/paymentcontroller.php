<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/paymentservice.php';

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
    }
    
    public function index()
    {
        $tickets = $this->paymentService->getAll();
        require __DIR__ . '/../views/payment/payment.php';
    }
}
?>