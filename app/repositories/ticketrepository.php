<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';
require_once __DIR__ . '/../services/eventservice.php';


class TicketRepository extends Repository
{
    private $eventService;
    function __construct()
    {
        parent::__construct();
        $this->eventService = new EventService();
    }
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.*, te.event_id as event_id   FROM ticket t
            LEFT JOIN ticket_event te on t.id = te.ticket_id;");
            $stmt->execute();

            $tickets = array();
            while ($row = $stmt->fetch()) {
                $ticket = new Ticket();
                $ticket->setId($row['id']);
                $ticket->setType($row['type']);
                $ticket->setPrice($row['price']);
                $event = $this->eventService->getById($row['event_id']);
                $ticket->setEvent($event);
                $ticket->setTitle($row['title']);
                array_push($tickets, $ticket);
            }

            return $tickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.*, te.event_id as event_id   FROM ticket t
            LEFT JOIN ticket_event te on t.id = te.ticket_id WHERE t.id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $ticket = new Ticket();
            while ($row = $stmt->fetch()) {
                $ticket->setId($row['id']);
                $ticket->setType($row['type']);
                $ticket->setPrice($row['price']);
                $event = $this->eventService->getOne($row['event_id']);
                $ticket->setEvent($event);
                $ticket->setTitle($row['title']);
            }

            return $ticket;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}

?>