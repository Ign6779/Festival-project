<?php
require __DIR__ . '/../../services/orderservice.php';

class OrderController {
    private $orderService;

    public function __construct() {
        $this->orderService = new OrderService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $orders = $this->orderService->getAll();
            echo json_encode($orders);
        }
    }
}