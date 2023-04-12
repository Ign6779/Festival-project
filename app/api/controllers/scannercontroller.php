<?php
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/ticketorderservice.php';

class ScannerController{
    private $orderService;
    private $ticketOrderService;

    function __construct(){
        $this->orderService = new OrderService();
        $this->ticketOrderService = new TicketOrderService();
    }
    function index(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $order = $this->orderService->getAll();
            echo json_encode($order);
        }
    }
    public function changeScannedStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['orderId'];
            $this->ticketOrderService->changeScannedStatus($id);
            echo "success";
        }
    }

    public function getScannerInformation(){
        if(isset($_GET['ticketOrder'])){
            $id=htmlspecialchars($_GET['ticketOrder']);
            $ticketOrder = $this->ticketOrderService->getScannerInformation($id);
            require_once __DIR__ . '/../../views/employee/scanner.php';
        }   
    }
}

?>