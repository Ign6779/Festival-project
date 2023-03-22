<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/venueservice.php';

class VenueController extends Controller
{
    private $venueService;
    public function __construct()
    {
        $this->venueService = new VenueService();
    }

    public function index()
    {
        require __DIR__ . '/../views/admin/venues/index.php';
    }

    public function addVenueForm()
    {
        require __DIR__ . '/../views/admin/venues/addvenue.php';
    }

    public function editVenueForm()
    {
        if (isset($_GET['venueId'])) {
            $id = htmlspecialchars($_GET['venueId']);
            $venue = $this->venueService->getOne($id);
            require __DIR__ . '/../views/admin/venues/editvenue.php';
        }
    }

    public function addVenue()
    {
        if (isset($_POST['addvenue'])) {
            $venueName = htmlspecialchars($_POST['venuename']);
            $venueLocation = htmlspecialchars($_POST['venuelocation']);
            $this->venueService->insert($venueName, $venueLocation);
            $this->index();
        }
    }

    public function updateVenue()
    {
        if (isset($_POST['updatevenue'])) {
            $id = htmlspecialchars($_GET['venueid']);
            $venueName = htmlspecialchars($_POST['venuename']);
            $venueLocation = htmlspecialchars($_POST['venuelocation']);
            $this->venueService->update($id, $venueName, $venueLocation);
            $this->index();
        }
    }

}
?>