<?php
require_once __DIR__ . '/../../services/ticketservice.php';
require_once __DIR__ . '/../../services/eventservice.php';

class TicketController
{
    private $ticketService;
    private $eventService;

    function __construct()
    {
        $this->ticketService = new TicketService();
        $this->eventService = new EventService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $tickets = $this->ticketService->getAll();
            echo json_encode($tickets);
        }
    }

    public function filter()
    {
        $filteredTickets = array();
        $tickets = $this->ticketService->getAll();
        $optionevent = htmlspecialchars($_GET['event']);
        foreach ($tickets as $ticket) {
            if ($ticket->getEvent()->getType() == $optionevent) {
                array_push($filteredTickets, $ticket);
            }
        }
        echo json_encode($filteredTickets);
    }
}


?>