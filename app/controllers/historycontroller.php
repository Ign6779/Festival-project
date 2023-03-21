<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/tourservice.php';
require_once __DIR__ . '/../services/tourlocationsservice.php';

class HistoryController extends Controller
{

    private $tourService;
    private $locationService;

    public function __construct()
    {
        $this->tourService = new TourService();
        $this->locationService = new TourLocationsService();
    }


    public function index()
    {
        $locations = $this->locationService->getAllTourlocations();
        $tours = $this->tourService->getAll();
        require __DIR__ . '/../views/festival/history.php';
    }
}
?>