<?php
require_once __DIR__ . '/../repositories/orderrepository.php';

class OrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrderRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById(int $id) {
        return $this->repository->getById($id);
    }

    public function createOrder($order)
    {
        $this->repository->createOrder($order);
    }

    public function getOrderByPaymentId($id)
    {
        return $this->repository->getOrderByPaymentId($id);
    }

    public function updateOrder($order)
    {
        $this->repository->updateOrder($order);
    }

    public function getOrderByToken($token)
    {
        return $this->repository->getOrderByToken($token);
    }

}