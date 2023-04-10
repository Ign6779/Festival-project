<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/jazzservice.php';

class JazzEventController extends Controller {
    private $jazzService;

    public function __construct() {
        $this->jazzService = new JazzService();
    }

    public function index() {
        require __DIR__ . '/../views/admin/jazz/index.php';
    }

    public function addJazzEventForm() {
        require __DIR__ . '/../views/admin/jazz/addjazz.php';
    }

    public function addJazzEvent() {
        require_once __DIR__ . '/../models/jazz.php';

        if (isset($_POST['addjazzevent'])) {
            $jazzEvent = new JazzEvent();
            $jazzEvent->setTitle($_POST['title']);
            $jazzEvent->setVenueId(htmlspecialchars($_POST['venueId']));
            $jazzEvent->setDate(htmlspecialchars($_POST['date']));
            $jazzEvent->setStartTime(htmlspecialchars($_POST['starttime']));
            $jazzEvent->setEndTime(htmlspecialchars($_POST['endtime']));
            $jazzEvent->setPrice(htmlspecialchars($_POST['price']));
            $jazzEvent->setSeats(htmlspecialchars($_POST['seats']));
            $this->jazzService->createJazz($jazzEvent);
        }

        header('Location: /jazzevent');
    }

    public function editJazzEventForm() {
        if (isset($_GET['jazzEventId'])) {
            $id = htmlspecialchars($_GET['jazzEventId']);
            $jazzEvent = $this->jazzService->getById($id);
            // var_dump($jazzEvent);
            require __DIR__ . '/../views/admin/jazz/editjazz.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateJazzEvent() {
        if (isset($_POST['updateJazzEvent']) && isset($_GET['jazzEventId'])) {
            $jazzEvent = new JazzEvent();
            $jazzEvent->setId(htmlspecialchars((int)$_GET['jazzEventId']));
            $jazzEvent->setTitle(htmlspecialchars($_POST['title']));
            $jazzEvent->setVenueId(htmlspecialchars($_POST['venueId']));
            $jazzEvent->setDate(htmlspecialchars($_POST['date']));
            $jazzEvent->setStartTime(htmlspecialchars($_POST['starttime']));
            $jazzEvent->setEndTime(htmlspecialchars($_POST['endtime']));
            $jazzEvent->setPrice(htmlspecialchars($_POST['price']));
            $jazzEvent->setSeats(htmlspecialchars($_POST['seats']));
            $jazzEvent->setEventId(htmlspecialchars($_POST['eventId']));
            $this->jazzService->updateJazz($jazzEvent);
        
        } else {
            echo "something has gone wrong";
        }
        header('Location: /jazzevent');
    }
}