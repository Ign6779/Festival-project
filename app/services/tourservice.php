<?php
require __DIR__ . '/../repositories/tourrepository.php';

class TourService {
    private $repository;

    public function __construct() {
        $this->repository = new TourRepository();
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