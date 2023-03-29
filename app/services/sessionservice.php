<?php
require __DIR__ . '/../repositories/sessionrepository.php';

class SessionService {
    private $repository;

    public function __construct() {
        $this->repository = new SessionRepository();
    }

    public function getAll() {
        $sessions = $this->repository->getAll();
        return $sessions;
    }

    public function getById(int $id) {
        $session = $this->repository->getById($id);
        return $session;
    }

    public function getByRestaurant(int $restaurantId) {
        $session = $this->repository->getByRestaurant($restaurantId);
        return $session;
    }

    public function createSession(Session $session) {
        $this->repository->createSession($session);
    }

    public function updateSession(Session $session) {
        $this->repository->updateSession($session);
    }

    public function deleteSession(int $id) {
        $this->repository->deleteSession($id);
    }
}

?>