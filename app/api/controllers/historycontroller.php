<?php
require_once __DIR__ . '/../../services/tourlocationsservice.php';

class HistoryController
{

    private $locationService;

    function __construct()
    {
        $this->locationService = new TourLocationsService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $locations = $this->locationService->getAllTourlocations();
            echo json_encode($locations);
        }
    }


    public function getOneLocaion()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $location = $this->locationService->getById($_GET["id"]);
            echo json_encode($location);
        }
    }
}


?>