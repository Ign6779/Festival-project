<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/ticketservice.php';

class TicketController extends Controller
{
    private $ticketService;

    public function __construct()
    {
        $this->ticketService = new TicketService();
    }
    
    public function index()
    {
        $tickets = $this->ticketService->getAll();
        require __DIR__ . '/../views/ticket/ticket.php';
    }
}
?>