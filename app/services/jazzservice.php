<?php
require __DIR__ . '/../repositories/jazzrepository.php';

class JazzService {
    private $repository;

    public function __construct() {
        $this->repository = new JazzRepository();
    }

    public function getAll() {
        $repository
    }
}