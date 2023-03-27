<?php
require __DIR__ . '/../repositories/paymentrepository.php';
class PaymentService {
    private $repository;

    public function __construct() {
        $this->repository = new PaymentRepository();
    }

    public function getAll() {
        $orders = $this->repository->getAll();
        return $orders;
    }
}
?>