<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/tourservice.php';

class HistoryController extends Controller {

    private $tourService;

    public function __construct(){
        $this->tourService = new TourService();
    }


    public function index(){
        $tours = $this->tourService->getAll();
        require __DIR__ . '/../views/festival/history.php';
    }
}
?>