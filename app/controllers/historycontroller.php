<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/tourservice.php';
require __DIR__ . '/../services/locationservice.php';

class HistoryController extends Controller
{

    private $tourService;
    private $locationService;

    public function __construct()
    {
        $this->tourService = new TourService();
        $this->locationService = new LocationService();
    }


    public function index()
    {
        $locations = $this->locationService->getAll();
        $tours = $this->tourService->getAll();
        require __DIR__ . '/../views/festival/history.php';
    }
}
?>