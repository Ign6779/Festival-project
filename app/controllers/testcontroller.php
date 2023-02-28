<?php
require __DIR__ . '/controller.php';
//require __DIR__ . '/../services/tourservice.php';
require __DIR__ . '/../services/restaurantservice.php';

class TestController extends Controller {
    //private $tourService;
    private $restaurantService;

    public function __construct() {
        //$this->tourService = new TourService();
        $this->restaurantService = new RestaurantService();
    }
    public function index() {
        //$tours = $this->tourService->getAll();
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/festival/test.php';
    }
}