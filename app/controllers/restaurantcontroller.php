<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/restaurantservice.php';

class RestaurantController extends Controller {
    private $restaurantService;

    public function __construct() {
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        require __DIR__ . '/../views/admin/restaurants/index.php';
    }
}