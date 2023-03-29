<?php
require __DIR__ . '/controller.php';
//require __DIR__ . '/../services/tourservice.php';
// require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/sessionservice.php';
//require __DIR__ . '/../services/jazzservice.php';
//require __DIR__ . '/../services/danceservice.php';
//require __DIR__ . '/../services/eventservice.php';

class TestController extends Controller {
    //private $tourService;
    // private $restaurantService;
    private $sessionService;
    //private $jazzService;
    //private $danceService;
    //private $eventService;

    public function __construct() {
        //$this->tourService = new TourService();
        // $this->restaurantService = new RestaurantService();
        $this->sessionService = new SessionService();
        //$this->jazzService = new JazzService();
        //$this->danceService = new DanceService();
        //$this->eventService = new EventService();
    }
    public function index() {
        //$tours = $this->tourService->getAll();
        //$restaurants = $this->restaurantService->getAll();
        //$jazzEvents = $this->jazzService->getAll();
        //$danceEvents = $this->danceService->getAll();
        $sessions = $this->sessionService->getAll();
        require __DIR__ . '/../views/festival/test.php';
    }
}
?>