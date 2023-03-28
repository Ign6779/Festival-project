<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/orderservice.php';

class PaymentController extends Controller
{
    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }
    
    public function index()
    {
        $tickets = $this->orderService->getAll();
        require __DIR__ . '/../views/payment/payment.php';
    }
}
?>