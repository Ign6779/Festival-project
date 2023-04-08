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

    public function getOne(int $id) {
        return $this->repository->getOne($id);
    }

    public function getById(int $id) {
        $restaurant = $this->repository->getById($id);
        return $restaurant;
    }

    public function createRestaurant(Restaurant $restaurant) {
        $this->repository->createRestaurant($restaurant);
    }

    public function updateRestaurant(Restaurant $restaurant) {
        $this->repository->updateRestaurant($restaurant);
    }

    public function deleteRestaurant(int $id) {
        $this->repository->deleteRestaurant($id);
    }
}
?>