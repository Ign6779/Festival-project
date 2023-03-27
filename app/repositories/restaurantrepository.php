<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/restaurant.php';
//require __DIR__ . '/../models/session.php';

class RestaurantRepository extends Repository
{
    public function getAll()
    { //cannot use the same structure as other times since it gets info from many tables, including an array within a class.
        try {
            $stmt = $this->connection->prepare("SELECT r.*, s.id AS sessionId, e.date, e.start_time as startTime, e.end_time as endTime, s.seats, s.price
            FROM restaurants r 
            LEFT JOIN sessions s ON r.id = s.restaurantId
            LEFT JOIN events e on e.id = s.event_id"); //only way i could imagine of doing it tbh
            $stmt->execute();

            $restaurants = [];

            while ($row = $stmt->fetch()) {
                $restaurantId = $row['id'];

                if (!isset($restaurants[$restaurantId])) { //since we get multiple times the same fields
                    $restaurant = new Restaurant();
                    $restaurant->setId($row['id']);
                    $restaurant->setName($row['name']);
                    $restaurant->setLocation($row['location']);
                    $restaurant->setDescription($row['description']);
                    $restaurant->setContent($row['content']);
                    $restaurant->setHalal($row['halal']);
                    $restaurant->setVegan($row['vegan']);
                    $restaurant->setStars($row['stars']);
                    $restaurant->setDuration($row['duration']);
                    $restaurant->setImage($row['image']);

                    $restaurants[$restaurantId] = $restaurant;
                }

                $session = new Session();
                $session->setId($row['sessionId']);
                $session->setDate($row['date']);
                $session->setStartTime($row['startTime']);
                $session->setEndTime($row['endTime']);
                $session->setSeats($row['seats']);
                $session->setPrice($row['price']);

                $restaurants[$restaurantId]->addSession($session);
            }

            return array_values($restaurants);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getBasicInfo()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * 
            FROM restaurants");
            $stmt->execute();

            $restaurants = [];

            while ($row = $stmt->fetch()) {
                $restaurantId = $row['id'];
                $restaurant = new Restaurant();
                $restaurant->setId($row['id']);
                $restaurant->setName($row['name']);
                $restaurant->setDescription($row['description']);
                $restaurant->setDuration($row['duration']);
                $restaurant->setHalal($row['halal']);
                $restaurant->setVegan($row['vegan']);
                $restaurant->setStars($row['stars']);
                $restaurant->setImage($row['image']);

                $restaurants[$restaurantId] = $restaurant;
            }
        } catch (PDOException $e) {
            echo $e;
        }

        return $restaurants;
    }

    public function getById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT r.*, s.id AS sessionId, e.date, e.start_time as startTime, e.end_time as endTime, s.seats, s.price 
            FROM restaurants r 
            LEFT JOIN sessions s ON r.id = s.restaurantId
            LEFT JOIN events e on e.id = s.event_id
            WHERE r.id = ?");
            $stmt->execute([$id]);

            $restaurant = null;

            while ($row = $stmt->fetch()) {
                if (!$restaurant) { //no longer in an array, decided to check for the object itself
                    $restaurant = new Restaurant();
                    $restaurant->setId($row['id']);
                    $restaurant->setName($row['name']);
                    $restaurant->setLocation($row['location']);
                    $restaurant->setDescription($row['description']);
                    $restaurant->setContent($row['content']);
                    $restaurant->setHalal($row['halal']);
                    $restaurant->setVegan($row['vegan']);
                    $restaurant->setStars($row['stars']);
                    $restaurant->setDuration($row['duration']);
                    $restaurant->setImage($row['image']);
                }

                $session = new Session();
                $session->setId($row['sessionId']);
                $session->setDate($row['date']);
                $session->setStartTime($row['startTime']);
                $session->setEndTime($row['endTime']);
                $session->setSeats($row['seats']);
                $session->setPrice($row['price']);

                $restaurant->addSession($session);
            }

            return $restaurant;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function AddRestaurant(Restaurant $restaurant) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO restaurants (name, location, description, content, halal, vegan, stars, duration, image)
            VALUES (:name, :location, :description, :content, :halal, :vegan, :stars, :duration, :image)");

        $stmt->bindValue(':name', $restaurant->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':location', $restaurant->getLocation(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $restaurant->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':content', $restaurant->getContent(), PDO::PARAM_STR);
        $stmt->bindValue(':halal', $restaurant->getHalal(), PDO::PARAM_BOOL);
        $stmt->bindValue(':vegan', $restaurant->getVegan(), PDO::PARAM_BOOL);
        $stmt->bindValue(':stars', $restaurant->getStars(), PDO::PARAM_INT);
        $stmt->bindValue(':duration', $restaurant->getDuration(), PDO::PARAM_STR);
        $stmt->bindValue(':image', $restaurant->getImage(), PDO::PARAM_STR);

        $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>