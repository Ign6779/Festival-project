<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/restaurantservice.php';

class YummyController extends Controller {

    private $restaurantService;

    public function __construct(){
        $this->restaurantService = new RestaurantService();
    }


    public function index(){
        $restaurants = $this->restaurantService->getBasicInfo();
        require __DIR__ . '/../views/festival/yummy.php';
    }
}
?>