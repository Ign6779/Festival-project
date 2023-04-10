<?php
require __DIR__ . '/../../services/danceservice.php';

class DanceEventController {
    private $danceService;

    public function __construct() {
        $this->danceService = new DanceService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $danceEvents = $this->danceService->getBasicInfo();
            echo json_encode($danceEvents);
        }
    }

    public function deleteDanceEvent() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['danceEventId']);
            $this->danceService->deleteDance($id);
        }
    }
}