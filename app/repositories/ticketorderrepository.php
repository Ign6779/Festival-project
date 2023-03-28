<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticketorder.php';

class TicketOrderRepository extends Repository
{
    function getAll()
    {
        try{
            $stmt = $this->connection->prepare("SELECT * FROM order_ticket;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'TicketOrder');
            $ticketOrder = $stmt->fetchAll();

            return $ticketOrder;
        } catch (PDOException $e){
            echo $e;
        }
    }
}
?>