<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/danceservice.php';

class DanceEventController extends Controller {
    private $danceService;

    public function __construct() {
        $this->danceService = new DanceService();
    }

    public function index() {
        require __DIR__ . '/../views/admin/dance/index.php';
    }

    public function addDanceEventForm() {
        require __DIR__ . '/../views/admin/dance/adddance.php';
    }

    public function addDanceEvent() {
        require_once __DIR__ . '/../models/dance.php';

        if (isset($_POST['adddanceevent'])) {
            $danceEvent = new DanceEvent();
            $danceEvent->setVenueId(htmlspecialchars($_POST['venueId']));
            $danceEvent->setDate(htmlspecialchars($_POST['date']));
            $danceEvent->setStartTime(htmlspecialchars($_POST['starttime']));
            $danceEvent->setEndTime(htmlspecialchars($_POST['endtime']));
            $danceEvent->setPrice(htmlspecialchars($_POST['price']));
            $danceEvent->setSeats(htmlspecialchars($_POST['seats']));
            $danceEvent->setSession(htmlspecialchars($_POST['session']));
            $this->danceService->createDance($danceEvent);
        }

        header('Location: /danceevent');
    }

    public function editDanceEventForm() {
        if (isset($_GET['danceEventId'])) {
            $id = htmlspecialchars($_GET['danceEventId']);
            $danceEvent = $this->danceService->getById($id);
            // var_dump($danceEvent);
            require __DIR__ . '/../views/admin/dance/editdance.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateDanceEvent() {
        if (isset($_POST['updateDanceEvent']) && isset($_GET['danceEventId'])) {
            $danceEvent = new DanceEvent();
            $danceEvent->setId(htmlspecialchars((int)$_GET['danceEventId']));
            $danceEvent->setVenueId(htmlspecialchars($_POST['venueId']));
            $danceEvent->setDate(htmlspecialchars($_POST['date']));
            $danceEvent->setStartTime(htmlspecialchars($_POST['starttime']));
            $danceEvent->setEndTime(htmlspecialchars($_POST['endtime']));
            $danceEvent->setPrice(htmlspecialchars($_POST['price']));
            $danceEvent->setSeats(htmlspecialchars($_POST['seats']));
            $danceEvent->setSession(htmlspecialchars($_POST['session']));
            $danceEvent->setEventId(htmlspecialchars($_POST['eventId']));
            $this->danceService->updateDance($danceEvent);
        
        } else {
            echo "something has gone wrong";
        }
        header('Location: /danceevent');
    }
}