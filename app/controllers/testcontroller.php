<?php
require __DIR__ . '/controller.php';
//require __DIR__ . '/../services/tourservice.php';
//require __DIR__ . '/../services/restaurantservice.php';
require __DIR__ . '/../services/jazzservice.php';

class TestController extends Controller {
    //private $tourService;
    //private $restaurantService;
    private $jazzService;

    public function __construct() {
        //$this->tourService = new TourService();
        //$this->restaurantService = new RestaurantService();
        $this->jazzService = new JazzService();
    }
    public function index() {
        //$tours = $this->tourService->getAll();
        //$restaurants = $this->restaurantService->getAll();
        $jazzEvents = $this->jazzService->getAll();
        require __DIR__ . '/../views/festival/test.php';
    }
}