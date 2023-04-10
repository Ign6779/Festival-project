<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';

class SessionController extends Controller {
    private $sessionService;

    public function __construct() {
        $this->sessionService = new SessionService();
    }

    public function index() {
        require __DIR__ . '/../views/admin/sessions/index.php';
    }

    public function addSessionForm() {
        require __DIR__ . '/../views/admin/sessions/addsession.php';
    }

    public function addSession() {
        require_once __DIR__ . '/../models/session.php';

        if (isset($_POST['addsession'])) {
            $session = new Session();
            $session->setDate(htmlspecialchars($_POST['date']));
            $session->setStartTime(htmlspecialchars($_POST['starttime']));
            $session->setEndTime(htmlspecialchars($_POST['endtime']));
            $session->setSeats(htmlspecialchars($_POST['seats']));
            $session->setPrice(htmlspecialchars($_POST['price']));
            $session->setRestaurantId(htmlspecialchars($_POST['restaurantId']));
            $this->sessionService->createSession($session);
        }

        header('Location: /session');
    }

    public function editSessionForm() {
        if (isset($_GET['sessionId'])) {
            $id = htmlspecialchars($_GET['sessionId']);
            $session = $this->sessionService->getById($id);
            require __DIR__ . '/../views/admin/sessions/editsession.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateSession() {
        if (isset($_POST['updateSession']) && isset($_GET['sessionId'])) {
            $session = new Session();
            $session->setId(htmlspecialchars((int)$_GET['sessionId']));
            $session->setDate(htmlspecialchars($_POST['date']));
            $session->setStartTime(htmlspecialchars($_POST['starttime']));
            $session->setEndTime(htmlspecialchars($_POST['endtime']));
            $session->setSeats(htmlspecialchars($_POST['seats']));
            $session->setPrice(htmlspecialchars($_POST['price']));
            $session->setEventid(htmlspecialchars((int)$_POST['eventId']));
            $this->sessionService->updateSession($session);
        } else {
            echo "something has gone wrong";
        }
        header('Location: /session');
    }
}