<?php
require __DIR__ . '/../repositories/orderrepository.php';

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

}