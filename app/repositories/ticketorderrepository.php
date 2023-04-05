<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticketorder.php';

class TicketOrderRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_ticket;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'TicketOrder');
            $ticketOrder = $stmt->fetchAll();

            return $ticketOrder;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertOrderTicket($orderTicket)
    {
        try {
            $order_id = $orderTicket->getOrderId();
            $event_id = $orderTicket->getTicketId();
            $qr_code = $orderTicket->getQrCode();
            $is_scanned = false;

            $stmt = $this->connection->prepare("INSERT INTO `order_ticket`(`order_id`, `event_id`, `qr_code`, `is_scaned`) VALUES (:order_id,:event_id,:qr_code,:is_scanned)");

            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':qr_code', $qr_code);
            $stmt->bindParam(':is_scanned', $is_scanned, PDO::PARAM_BOOL);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
