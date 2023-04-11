<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticketorder.php';
require_once __DIR__ . '/../services/eventservice.php';


class TicketOrderRepository extends Repository
{
    private $eventService;
    function __construct(){
        parent::__construct();
        $this->eventService = new EventService();
    }

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

            $stmt = $this->connection->prepare("INSERT INTO `order_ticket`(`order_id`, `event_id`, `is_scaned`) VALUES (:order_id,:event_id,:is_scanned)");

            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':is_scanned', $is_scanned, PDO::PARAM_BOOL);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getItemsByOrderId($order_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_ticket WHERE order_id = :id");
            $stmt->bindParam(':id', $order_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'TicketOrder');
            $ticketOrder = $stmt->fetchAll();

            return $ticketOrder;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function changeScannedStatus($id){
        try {
            $stmt = $this->connection->prepare("UPDATE `order_ticket` SET `is_scaned`='1' WHERE order_id= :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (Exception $e) {
            echo $e;
        }
    }

    function getScannerInformation($id){
        try{
            $stmt = $this->connection->prepare("SELECT * FROM order_ticket as ot
            WHERE ot.id = :id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            
            while ($row = $stmt->fetch()){
                $orderTicket = new TicketOrder();
                $orderTicket->setId($row['id']);
                $orderTicket->setOrderId($row['order_id']);
                //IMPORTANT !!!!!!
                $orderTicket->setTicketId($row['event_id']);
                $event = $this->eventService->getById($row['event_id']);
                $orderTicket->setEvent($event);
            }

            return $orderTicket;
        } catch (Exception $e) {
            echo $e;
        }
    }
}