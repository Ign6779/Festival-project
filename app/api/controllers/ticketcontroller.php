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

        foreach ($tickets as $ticket) {
            if (isset($_GET['event']) && isset($_GET['date'])) {
                $optionEvent = htmlspecialchars($_GET['event']);
                $optionDate = htmlspecialchars($_GET['date']);
                if ($ticket->getEvent()->getType() == $optionEvent && $ticket->getEvent()->getDate() == $optionDate) {
                    array_push($filteredTickets, $ticket);
                }
            } elseif (isset($_GET['event']) && !isset($_GET['date'])) {
                $optionEvent = htmlspecialchars($_GET['event']);
                if ($ticket->getEvent()->getType() == $optionEvent) {
                    array_push($filteredTickets, $ticket);
                }
            } elseif (!isset($_GET['event']) && isset($_GET['date'])) {
                $optionDate = htmlspecialchars($_GET['date']);
                if ($ticket->getEvent()->getDate() == $optionDate) {
                    array_push($filteredTickets, $ticket);
                }
            }

        }
        echo json_encode($filteredTickets);
    }
}


?>