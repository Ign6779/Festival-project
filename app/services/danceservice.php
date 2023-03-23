<?php
require __DIR__ . '/../repositories/dancerepository.php';
//require once if multiple things
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