<?php
require __DIR__ . '/../repositories/dancerepository.php';

class DanceService {
    private $repository;

    public function __construct() {
        $this->repository = new DanceRepository();
    }

    public function getAll() {
        $danceEvents = $this->repository->getAll();
        return $danceEvents;
    }

    public function getArtists() {
        $artists = $this->repository->getArtists();
        return $artists;
    }
}
?>