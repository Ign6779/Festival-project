<?php
require __DIR__ . '/../repositories/venuerepository.php';

class VenueService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new VenueRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function insert($venueName, $venueLocation)
    {
        $this->repository->insert($venueName, $venueLocation);
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function update($id, $venueName, $venueLocation)
    {
        $this->repository->update($id, $venueName, $venueLocation);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
    }

}