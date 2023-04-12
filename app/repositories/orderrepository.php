<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/order.php';

class OrderRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `order`");
            $stmt->execute();

            $orders = [];

            while ($row = $stmt->fetch()) {
                $orderId = $row['id'];

                if (!isset($orders[$orderId])) {
                    $order = new order();
                    $order->setId($row['id']);
                    $order->setUserId($row['user_id']);
                    $order->setAmount($row['amount']);
                    $order->setStatus($row['status']);
                    $order->setPaymentMethod($row['payment_method']);
                    $order->setTimeOfPurchase($row['time_of_purchase']);
                    $order->setPaymentId($row['payment_id']);

                    $orders[$orderId] = $order;
                }
            }

            return array_values($orders);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `order` WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $order = new order();

            while ($row = $stmt->fetch()) {
                $order = new order();
                    $order->setId($row['id']);
                    $order->setUserId($row['user_id']);
                    $order->setAmount($row['amount']);
                    $order->setStatus($row['status']);
                    $order->setPaymentMethod($row['payment_method']);
                    $order->setTimeOfPurchase($row['time_of_purchase']);
                    $order->setPaymentId($row['payment_id']);

            }
            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
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

            $stmt = $this->connection->prepare("INSERT INTO `order`( `user_id`, `amount`, `status`, `payment_method`, `time_of_purchase`, `payment_id`) VALUES (:userId, :amount,:stat, :pm, NOW(), :paymentId)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':stat', $status);
            $stmt->bindParam(':pm', $paymentMethod);
            // $stmt->bindParam(':timePurchase', $timeOfPurchase);
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
            $payLaterToken = $order->getToken();
            $stmt = $this->connection->prepare("UPDATE `order` SET `user_id`= :userId,`amount`=:amount,`status`=:stat,`payment_method`= :pm,`time_of_purchase`= :timePurchase,`payment_id`=:paymentId , `pay_later_token` = :token Where id= :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':stat', $status);
            $stmt->bindParam(':pm', $paymentMethod);
            $stmt->bindParam(':timePurchase', $timeOfPurchase);
            $stmt->bindParam(':paymentId', $paymentId);
            if ($payLaterToken != null) {
                $stmt->bindParam(':token', $payLaterToken);
            } else {
                $stmt->bindValue(':token', null, PDO::PARAM_NULL);
            }
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
    public function getOrderByToken($token)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `order` WHERE `pay_later_token` = :token");
            $stmt->bindParam(':token', $token);
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