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

    public function createTour(Tour $tour) {
        $this->repository->createTour($tour);
    }

    public function updateTour(Tour $tour) {
        $this->repository->updateTour($tour);
    }

    public function deleteTour(int $id) {
        $this->repository->deleteTour($tour);
    }
}