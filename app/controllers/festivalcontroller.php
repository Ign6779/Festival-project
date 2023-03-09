<?php
require __DIR__ . '/controller.php';
//require __DIR__ . '/../services/userservice.php';
//require __DIR__ . '/../services/restaurantservice.php';

class FestivalController extends Controller {

    //private $userService;

    public function __construct(){
        //$this->userService = new UserService();
    }

    public function overview(){
        require __DIR__ . '/../views/festival/overview.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }

    public function history(){
        require_once __DIR__ . '/../services/tourservice.php';
        $tourService = new TourService();
        $tours = $tourService->getAll();
        require __DIR__ . '/../views/festival/history.php';
    }

    public function jazz(){
        require __DIR__ . '/../views/festival/jazz.php';
    }

    public function kids(){
        require __DIR__ . '/../views/festival/kids.php';
    }

    public function yummy(){
        require_once __DIR__ . '/../services/restaurantService';
        $restaurantService = new RestaurantService();
        $restaurants = $restaurantService->getAll();
        require __DIR__ . '/../views/festival/yummy.php';
    }
}
?>