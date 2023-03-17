<?php
require __DIR__ . '/../repositories/kidsrepository.php';

class KidsService {
    private $repository;

    public function __construct() {
        $this->repository = new KidsRepository();
    }

    public function getAll() {
        $kidsActivities = $this->repository->getAll();
        return $kidsActivities;
    }
}