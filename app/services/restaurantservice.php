<?php
require __DIR__ . '/../repositories/restaurantrepository.php';

class RestaurantService {
    private $repository;

    public function __construct() {
        $this->repository = new RestaurantRepository();
    }

    public function getAll() {
        $restaurants = $this->repository->getAll();
        return $restaurants;
    }

    public function getBasicInfo() {
        $restaurants = $this->repository->getBasicInfo();
        return $restaurants;
    }

    public function getByName(string $name) {
        $restaurant = $this->repository->getByName($name);
        return $restaurant;
    }
}
?>