<?php
require __DIR__ . '/../../services/locationservice.php';

class HistoryController
{

    private $locationService;

    function __construct()
    {
        $this->locationService = new LocationService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $locations = $this->locationService->getAll();
            echo json_encode($locations);
        }
    }


    public function getOneLocaion()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $location = $this->locationService->getOne($_GET["id"]);
            echo json_encode($location);
        }
    }
}


?>