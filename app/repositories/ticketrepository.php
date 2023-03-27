<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/ticket.php';

class TicketRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT t.*, te.event_id as event_id   FROM ticket t
            LEFT JOIN ticket_event te on t.id = te.ticket_id;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
            $tickets = $stmt->fetchAll();

            return $tickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}

?>