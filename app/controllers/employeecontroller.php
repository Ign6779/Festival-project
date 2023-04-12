<?php
require __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/../services/ticketorderservice.php';

class EmployeeController extends Controller
{
    private $orderService;
    private $ticketOrderService;
    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->ticketOrderService = new TicketOrderService();
    }


    public function index()
    {
        require __DIR__ . '/../views/employee/index.php';
    }

    public function getOrderTicketInformation()
    {
        if(isset($_GET['orderUid'])){
            $id=htmlspecialchars($_GET['orderUid']);
            $ticketOrder = $this->ticketOrderService->getScannerInformation($id);
            require_once __DIR__ . '/../views/employee/scanner.php';
        }
    }
}
?> 