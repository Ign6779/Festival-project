<?php
require __DIR__ . '/../services/restaurantservice.php';

class YummyController {
    private $restaurantService;

    public function __construct() {
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $restaurant = $this->restaurantService
        }
    }
}

?>