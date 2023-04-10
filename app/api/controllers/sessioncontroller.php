<?php
require __DIR__ . '/../../services/sessionservice.php';

class SessionController {
    private $sessionService;

    public function __construct() {
        $this->sessionService = new SessionService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $sessions = $this->sessionService->getAll();
            echo json_encode($sessions);
        }
    }

    public function deleteSession() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['sessionId']);
            var_dump($id); // check if $id has a value
            var_dump($this->sessionService); // check if $this->sessionService is set correctly
            $this->sessionService->deleteSession($id);
            echo 'finished';
        }
    }
}