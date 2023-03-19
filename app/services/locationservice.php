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
}