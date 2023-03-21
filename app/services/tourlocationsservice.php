<?php
require_once __DIR__ . '/../repositories/tourlocationsrepository.php';

class TourLocationsService {

    private $repository;

    public function __construct() {
    $this->repository = new TourLocationsRepository();
    }

    public function getAllTourlocations() {
        $toursLocations = $this->repository->getAll();
        return $toursLocations;
    }

    public function getById($id) {
        return $this->repository->getById($id);
    }
}

?>