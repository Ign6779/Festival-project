<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/order.php';

class OrderRepository extends Repository
{
    public function getAll()
    {

    }

    public function createOrder($order)
    {
        try {
            $userId = $order->getUserId();
            $amount = $order->getAmount();
            $status = $order->getStatus();
            $paymentMethod = $order->getPaymentMethod();
            $timeOfPurchase = $order->getTimeOfPurchase();
            $paymentId = $order->getPaymentId();

            $stmt = $this->connection->prepare("INSERT INTO `order`( `user_id`, `amount`, `status`, `payment_method`, `time_of_purchase`, `payment_id`) VALUES (:userId, :amount,:stat, :pm, :timePurchase, :paymentId)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':stat', $status);
            $stmt->bindParam(':pm', $paymentMethod);
            $stmt->bindParam(':timePurchase', $timeOfPurchase);
            $stmt->bindParam(':paymentId', $paymentId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateOrder($order)
    {
        try {
            $id = $order->getId();
            $userId = $order->getUserId();
            $amount = $order->getAmount();
            $status = $order->getStatus();
            $paymentMethod = $order->getPaymentMethod();
            $timeOfPurchase = $order->getTimeOfPurchase();
            $paymentId = $order->getPaymentId();
            $stmt = $this->connection->prepare("UPDATE `order` SET `user_id`= :userId,`amount`=:amount,`status`=:stat,`payment_method`= :pm,`time_of_purchase`= :timePurchase,`payment_id`=:paymentId Where id= :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':stat', $status);
            $stmt->bindParam(':pm', $paymentMethod);
            $stmt->bindParam(':timePurchase', $timeOfPurchase);
            $stmt->bindParam(':paymentId', $paymentId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOrderByPaymentId($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `order` WHERE payment_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $order = $stmt->fetch();

            return $order;

        } catch (PDOException $e) {
            echo $e;
        }

    }
}


?>