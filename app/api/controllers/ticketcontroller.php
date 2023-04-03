<?php
require_once __DIR__ . '/../../services/eventservice.php';

class TicketController
{
    private $eventService;

    function __construct()
    {
   
        $this->eventService = new EventService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $events = $this->eventService->getAll();
            echo json_encode($events);
        }
    }

    public function filter()
    {
        $filteredEvents = array();
        $events = $this->eventService->getAll();

        foreach ($events as $event) {
            if (isset($_GET['event']) && isset($_GET['date'])) {
                $optionEvent = htmlspecialchars($_GET['event']);
                $optionDate = htmlspecialchars($_GET['date']);
                if ($event->getType() == $optionEvent && $event->getDate() == $optionDate) {
                    array_push($filteredEvents, $event);
                }
            } elseif (isset($_GET['event']) && !isset($_GET['date'])) {
                $optionEvent = htmlspecialchars($_GET['event']);
                if ($event->getType() == $optionEvent) {
                    array_push($filteredEvents, $event);
                }
            } elseif (!isset($_GET['event']) && isset($_GET['date'])) {
                $optionDate = htmlspecialchars($_GET['date']);
                if ($event->getDate() == $optionDate) {
                    array_push($filteredEvents, $event);
                }
            }

        }
        echo json_encode($filteredEvents);
    }

}


?>