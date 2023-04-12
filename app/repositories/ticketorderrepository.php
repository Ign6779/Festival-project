<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticketorder.php';
require_once __DIR__ . '/../services/eventservice.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../services/orderservice.php';

class TicketOrderRepository extends Repository
{
    private $eventService;
    private $userService;
    function __construct()
    {
        parent::__construct();
        $this->eventService = new EventService();
        $this->userService = new UserService();
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
            $order_id = $orderTicket->getOrder()->getId();
            $event_id = $orderTicket->getEvent()->getId();
            $uuid = $orderTicket->getUuId();
            $is_scanned = false;
            $stmt = $this->connection->prepare("INSERT INTO `order_ticket`(`order_id`, `event_id`, `is_scaned` , `uuid`) VALUES (:order_id,:event_id,:is_scanned,:uuid)");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':is_scanned', $is_scanned, PDO::PARAM_BOOL);
            $stmt->bindParam(':uuid', $uuid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getItemsByOrderId($order_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT ot.*, o.user_id FROM order_ticket ot LEFT JOIN `order` o ON ot.order_id = o.id WHERE ot.order_id = :id");
            $stmt->bindParam(':id', $order_id);
            $stmt->execute();
            $orderTickets = [];
            while ($row = $stmt->fetch()) {
                $orderTicket = new TicketOrder();
                $orderTicket->setId($row['id']);
                $event = $this->eventService->getById($row['event_id']);
                $user = $this->userService->getUserById($row['user_id']);
                $orderTicket->setEvent($event);
                $orderTicket->setUser($user);
                $orderTicket->setUuId($row['uuid']);
                array_push($orderTickets, $orderTicket);
            }

            return $orderTickets;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function changeScannedStatus($id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `order_ticket` SET `is_scaned`='1' WHERE order_id= :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (Exception $e) {
            echo $e;
        }
    }

    function getScannerInformation($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT ot.*, o.user_id FROM order_ticket ot LEFT JOIN `order` o ON ot.order_id = o.id
            WHERE ot.uuid = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $orderTicket = new TicketOrder();
                $orderTicket->setId($row['id']);
                $event = $this->eventService->getById($row['event_id']);
                $user = $this->userService->getUserById($row['user_id']);
                $orderTicket->setEvent($event);
                $orderTicket->setUser($user);
                $orderTicket->setIsScanned($row['is_scaned']);
            }

            return $orderTicket;
        } catch (Exception $e) {
            echo $e;
        }
    }
}