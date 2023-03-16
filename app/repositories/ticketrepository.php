<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/ticket.php';

class TicketRepository extends Repository
{
    function getAll($dance = NULL, $jazz = NULL)
    {
        try {
            $query = "SELECT * FROM tickets";
            if (isset($dance)) {
                $query .= " WHERE type= :dance ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($dance) ) {
                $stmt->bindParam(':dance', $dance, PDO::PARAM_INT);
                // $stmt->bindParam(':jazz', $jazz, PDO::PARAM_INT);
            }
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