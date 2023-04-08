<?php
require __DIR__ . '/../../services/restaurantservice.php';

class RestaurantController {
    private $restaurantService;

    function __construct() {
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $restaurants = $this->restaurantService->getBasicInfo();
            echo json_encode($restaurants);
        }
    }

    public function deleteRestaurant() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['restaurantId']);
            $this->restaurantService->deleteRestaurant($id);
        }
    }
}