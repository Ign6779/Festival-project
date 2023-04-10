<?php
require __DIR__ . '/../../services/jazzservice.php';

class JazzEventController {
    private $jazzService;

    public function __construct() {
        $this->jazzService = new JazzService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $jazzEvents = $this->jazzService->getBasicInfo();
            echo json_encode($jazzEvents);
        }
    }

    public function deleteJazzEvent() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['jazzEventId']);
            $this->jazzService->deleteJazz($id);
        }
    }
}