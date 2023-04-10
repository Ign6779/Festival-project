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
    
    public function getBasicInfo() {
        return $this->repository->getBasicInfo();
    }

    public function getById(int $id) {
        return $this->repository->getById($id);
    }

    public function getArtists() {
        $artists = $this->repository->getArtists();
        return $artists;
    }

    public function createDance(DanceEvent $dance) {
        $this->repository->createDance($dance);
    }

    public function updateDance(DanceEvent $dance) {
        $this->repository->updateDance($dance);
    }

    public function deleteDance(int $id) {
        $this->repository->deleteDance($id);
    }
}
?>