<?php

require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/order.php';

Class OrderRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $order = $stmt->fetchAll();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>