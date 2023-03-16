<?php
require __DIR__ . '/../../services/restaurantservice.php';

class YummyController {
    private $restaurantService;

    public function __construct() {
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $restaurants = $this->restaurantService->getAll();

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($restaurants);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //not gonna mess w this for now
        }
    }

    function getOne() {
        $id = $_GET['id'];
        $restaurant = $this->restaurantService->getById($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($restaurant);
    }
}
?>