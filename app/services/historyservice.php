<?php
require __DIR__ . '/../repositories/historyrepository.php';

class HistoryService {
    private $repository;

    public function __construct() {
        $this->repository = new HistoryRepository();
    }

    public function getAll() {
        $tours = $this->repository->getAll();
        return $tours;
    }

    public function getById($id) {
        $tour = $this->repository->getById($id);
        return $tour;
    }
}