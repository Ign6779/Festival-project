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

    public function addRestaurantForm() {
        require __DIR__ . '/../views/admin/restaurants/addrestaurant.php';
    }

    public function addRestaurant() {
        require_once __DIR__ . '/../models/restaurant.php';

        if (isset($_POST['addrestaurant'])) {
            $restaurant = new Restaurant();
            $restaurant->setName(htmlspecialchars($_POST['restaurantname']));
            $restaurant->setLocation(htmlspecialchars($_POST['location']));
            $restaurant->setDescription(htmlspecialchars($_POST['description']));
            $restaurant->setContent(htmlspecialchars($_POST['content']));
            $restaurant->setHalal(isset($_POST['halal']) ? true : false);
            $restaurant->setVegan(isset($_POST['vegan']) ? true : false);
            $restaurant->setStars(htmlspecialchars($_POST['stars']));
            $restaurant->setDuration(htmlspecialchars($_POST['duration']));
            $restaurant->setImage("testimage.png");
            $this->restaurantService->createRestaurant($restaurant);
        }

        $this->index();
    }

    public function editRestaurantForm() {
        if (isset($_GET['restaurantId'])) {
            $id = htmlspecialchars($_GET['restaurantId']);
            $restaurant = $this->restaurantService->getOne($id);
            require __DIR__ . '/../views/admin/restaurants/editrestaurant.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateRestaurant() {
        if (isset($_POST['updateRestaurant'])) {
            $restaurant = new Restaurant();
            $restaurant->setId(htmlspecialchars((int)$_GET['restaurantId']));
            $restaurant->setName(htmlspecialchars($_POST['restaurantname']));
            $restaurant->setLocation(htmlspecialchars($_POST['location']));
            $restaurant->setDescription(htmlspecialchars($_POST['description']));
            $restaurant->setContent(htmlspecialchars($_POST['content']));
            $restaurant->setHalal(isset($_POST['halal']) ? true : false);
            $restaurant->setVegan(isset($_POST['vegan']) ? true : false);
            $restaurant->setStars(htmlspecialchars($_POST['stars']));
            $restaurant->setDuration(htmlspecialchars($_POST['duration']));
            $restaurant->setImage("restaurant-brinkmann.png");
            $this->restaurantService->updateRestaurant($restaurant);
        }

        $this->index();
    }
}