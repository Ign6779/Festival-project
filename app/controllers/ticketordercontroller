<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/ticketorder.php';

class TicketOrderController extends Controller {
    private $ticketOrderService;

    public function __construct() {
        $this->ticketOrderService = new TicketOrderService();
    }

    public function index() {
        $ticketorders = $this->ticketOrderService->getAll();
        require __DIR__ . '/../views/ticket/ticket.php';
    }
}
?>