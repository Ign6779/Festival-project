<?php
require __DIR__ . '/../repositories/artistrepository.php';

class ArtistService {
    private $repository;

    public function __construct() {
        $this->repository = new ArtistRepository();
    }

    public function getAll() {
        $artists = $this->repository->getAll();
        return $artists;
    }
}
?>