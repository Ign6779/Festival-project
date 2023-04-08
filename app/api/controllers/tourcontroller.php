<?php
require __DIR__ . '/../../services/tourservice.php';

class TourController {
    private $tourService;

    public function __construct() {
        $this->tourService = new TourService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $tours = $this->tourService->getAll();
            echo json_encode($tours);
        }
    }

    public function deleteTour() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['tourId']);
            $this->tourService->deleteTour($id);
        }
    }
}