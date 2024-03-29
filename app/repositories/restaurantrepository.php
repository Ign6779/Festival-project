<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/restaurant.php';
//require __DIR__ . '/../models/session.php';

class RestaurantRepository extends Repository
{
    public function getAll()
    { //cannot use the same structure as other times since it gets info from many tables, including an array within a class.
        try {
            $stmt = $this->connection->prepare("SELECT r.*, s.id AS sessionId, e.date, e.start_time as startTime, e.end_time as endTime, e.seats, e.price, s.restaurantId, s.price, e.id as event_id
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
                $session->setRestaurantId($row['restaurantId']);
                $session->setEventId($row['event_id']);

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
                $restaurant->setLocation($row['location']);
                $restaurant->setDescription($row['description']);
                $restaurant->setContent($row['content']);
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

    public function getOne(int $id) {
        try {
            $stmt = $this->connection->prepare("SELECT * 
            FROM restaurants
            WHERE id = :id");
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $restaurant = new Restaurant();

            while ($row = $stmt->fetch()) {
                $restaurant->setId($row['id']);
                $restaurant->setName($row['name']);
                $restaurant->setLocation($row['location']);
                $restaurant->setDescription($row['description']);
                $restaurant->setContent($row['content']);
                $restaurant->setDuration($row['duration']);
                $restaurant->setHalal($row['halal']);
                $restaurant->setVegan($row['vegan']);
                $restaurant->setStars($row['stars']);
                $restaurant->setImage($row['image']);

                return $restaurant;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT r.*, s.id AS sessionId, e.date, e.start_time as startTime, e.end_time as endTime, e.seats, s.restaurantId, e.price, e.id as event_id
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
                $session->setRestaurantId($row['restaurantId']);
                $session->setEventId($row['event_id']);

                $restaurant->addSession($session);
            }

            return $restaurant;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createRestaurant(Restaurant $restaurant) {
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

    public function updateRestaurant(Restaurant $restaurant) {
        try {
            $stmt = $this->connection->prepare("UPDATE restaurants 
            SET name = :name, location = :location, description = :description, content = :content, halal = :halal, vegan = :vegan, stars = :stars, duration = :duration, image = :image 
            WHERE id = :id");

            $stmt->bindValue(':name', $restaurant->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':location', $restaurant->getLocation(), PDO::PARAM_STR);
            $stmt->bindValue(':description', $restaurant->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':content', $restaurant->getContent(), PDO::PARAM_STR);
            $stmt->bindValue(':halal', $restaurant->getHalal(), PDO::PARAM_BOOL);
            $stmt->bindValue(':vegan', $restaurant->getVegan(), PDO::PARAM_BOOL);
            $stmt->bindValue(':stars', $restaurant->getStars(), PDO::PARAM_INT);
            $stmt->bindValue(':duration', $restaurant->getDuration(), PDO::PARAM_STR);
            $stmt->bindValue(':image', $restaurant->getImage(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $restaurant->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteRestaurant(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM restaurants WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>