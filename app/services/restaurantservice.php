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

    public function getById(int $id) {
        $restaurant = $this->repository->getById($id);
        return $restaurant;
    }

    public function CreateRestaurant(Restaurant $restaurant) {
        $this->repository->CreateRestaurant($restaurant);
    }

    public function UpdateRestaurant(Restaurant $restaurant) {
        $this->repository->UpdateRestaurant($restaurant);
    }

    public function DeleteRestaurant(int $id) {
        $this->repository->DeleteRestaurant($id);
    }
}
?>