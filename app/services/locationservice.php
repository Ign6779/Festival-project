<?php
require __DIR__ . '/../repositories/locationrepository.php';

class LocationService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new LocationRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function createLocation(Location $location) {
        $this->repository->createLocation($location);
    }

    public function updateLocation(Location $location) {
        $this->repository->updateLocation($location);
    }

    public function deleteLocation(int $id) {
        $this->repository->deleteLocation($id);
    }
}