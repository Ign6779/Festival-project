<?php
require __DIR__ . '/../../services/jazzservice.php';

class JazzController {
    private $jazzService;

    public function __construct() {
        $this->jazzService = new JazzService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $events = $this->jazzService->getAll();
            $dates = $this->jazzService->getDatesOfEvents();
                
            echo json_encode($events);
            echo json_encode($dates);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //not gonna mess w this for now
        }
    }

    public function getByDate() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $date = $_GET["date"];
            $events = $this->jazzService->getByDate($date);
                
            echo json_encode($events);
        }
    }
}
?>