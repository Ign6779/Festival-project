<?php
require __DIR__ . '/controller.php';
//require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/restaurantservice.php';

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
        require __DIR__ . '/../views/festival/history.php';
    }

    public function jazz(){
        require __DIR__ . '/../views/festival/jazz.php';
    }

    public function kids(){
        require __DIR__ . '/../views/festival/kids.php';
    }

    public function yummy(){
        $restaurantService = new RestaurantService();
        require __DIR__ . '/../views/festival/yummy.php';
    }
}
?>