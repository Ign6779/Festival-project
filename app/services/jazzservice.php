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

    public function getById(int $id) {
        return $this->repository->getById($id);
    }

    public function getByDate($date) {
        return $this->repository->getByDate($date);
    }

    public function getArtists() {
        $artists = $this->repository->getArtists();
        return $artists;
    }

    public function createJazz(JazzEvent $jazz) {
        $this->repository->createJazz($jazz);
    }

    public function updateJazz(JazzEvent $jazz) {
        $this->repository->updateJazz($jazz);
    }

    public function deleteJazz(int $id) {
        $this->repository->deleteJazz($jazz);
    }

    public function getBasicInfo() {
        return $this->repository->getBasicInfo();
    }
}