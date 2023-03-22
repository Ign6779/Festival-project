<?php
require __DIR__ . '/../../services/venueservice.php';

class VenueController
{
    private $venuesService;

    function __construct()
    {
        $this->venuesService = new VenueService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $venues = $this->venuesService->getAll();
            echo json_encode($venues);
        }
    }

    public function deleteVunue()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id=htmlspecialchars($_GET['venueid']);
            $this->venuesService->delete($id);
        }
    }
}


?>