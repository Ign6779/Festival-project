<?php
require __DIR__ . '/../repositories/jazzrepository.php';

class JazzService {
    private $repository;

    public function __construct() {
        $this->repository = new JazzRepository();
    }

    public function getAll() {
        $jazzEvents = $this->repository->getAll();
        return $jazzEvents;
    }

    public function getDatesOfEvents() {
        $dates = $this->repository->getDatesOfEvents();
        return $dates;
    }

    public function getByDate($date) {
        return $this->repository->getByDate($date);
    }

    public function getArtists() {
        $artists = $this->repository->getArtists();
        return $artists;
    }
}