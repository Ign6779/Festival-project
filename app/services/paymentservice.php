<?php
require __DIR__ . '/../repositories/orderrepository.php';
class OrderService {
    private $repository;

    public function __construct() {
        $this->repository = new OrderRepository();
    }

    public function getAll() {
        $orders = $this->repository->getAll();
        return $orders;
    }
}
?>