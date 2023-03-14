<?php
require __DIR__ . '/../services/restaurantservice.php';

class YummyController {
    private $restaurantService;

    public function __construct() {
        $this->restaurantService = new RestaurantService();
    }

    
}

?>