<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/session.php';

class SessionRepository extends Repository {
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT e.date, e.start_time AS startTime, e.end_time AS endTime, e.seats, e.price, s.*
            FROM sessions s
            LEFT JOIN events e ON e.id = s.event_id");
            $stmt->execute();

            $sessions = [];

            while ($row = $stmt->fetch()) {
                $session = new Session();
                $session->setId($row['id']);
                $session->setDate($row['date']);
                $session->setStartTime($row['startTime']);
                $session->setEndTime($row['endTime']);
                $session->setSeats($row['seats']);
                $session->setPrice($row['price']);
                $session->setRestaurantId($row['restaurantId']);
                $session->setEventId($row['event_id']);

                $sessions[] = $session;
            }

            return $sessions;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById(int $id) {
        try {
            $stmt = $this->connection->prepare("SELECT e.date, e.start_time AS startTime, e.end_time AS endTime, e.seats, e.price, s.* 
            FROM sessions s 
            LEFT JOIN events e ON e.id = s.event_id
            WHERE s.id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $session = new Session();

            while ($row = $stmt->fetch()) {
                $session->setId($row['id']);
                $session->setDate($row['date']);
                $session->setStartTime($row['startTime']);
                $session->setEndTime($row['endTime']);
                $session->setSeats($row['seats']);
                $session->setPrice($row['price']);
                $session->setRestaurantId($row['restaurantId']);
                $session->setEventId($row['event_id']);
            }

            return $session;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getByRestaurant(int $id) {
        try {
            $stmt = $this->connection->prepare("SELECT e.date, e.start_time AS startTime, e.end_time AS endTime, e.seats, e.price, s.* 
            FROM sessions s
            LEFT JOIN events e ON e.id = s.event_id
            WHERE restaurantId = :restaurantId");
            $stmt->bindValue('restaurantId', $id, PDO::PARAM_INT);
            $stmt->execute();
            $sessions = [];

            while ($row = $stmt->fetch()) {
                $session = new Session();
                $session->setId($row['id']);
                $session->setDate($row['date']);
                $session->setStartTime($row['startTime']);
                $session->setEndTime($row['endTime']);
                $session->setSeats($row['seats']);
                $session->setPrice($row['price']);
                $session->setRestaurantId($row['restaurantId']);
                $session->setEventId($row['event_id']);

                $sessions[] = $session;
            }

            return $sessions;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getRestaurantName(int $id) {
        try {
            $stmt = $this->connection->prepare("SELECT r.name
            FROM sessions s
            LEFT JOIN restaurants r ON r.id = s.restaurantId 
            WHERE s.id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $restaurantName;

            while ($row = $stmt->fetch()) {
                $restaurantName = $row['name'];
            }

            return $restaurantName;
        } catch (PDOExecption $e) {
            echo $e;
        }
    }

    public function createSession(Session $session) {
        try {
            //setting in on two statements since it fills two tables. can be done in one, but for better understanding

            //filling in the events table part
            $stmt1 = $this->connection->prepare("INSERT INTO events (date, start_time, end_time, event_type, seats, price)
            VALUES (:date, :start_time, :end_time, :event_type, :seats, :price)");
            $stmt1->bindValue(':date', $session->getDate(), PDO::PARAM_STR);
            $stmt1->bindValue(':start_time', $session->getStartTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':end_time', $session->getEndTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':event_type', 'yummy');
            $stmt1->bindValue(':seats', $session->getSeats(), PDO::PARAM_INT);
            $stmt1->bindValue(':price', $session->getPrice(), PDO::PARAM_STR);

            $stmt1->execute();

            //filling in the sessions table part
            $eventId = $this->connection->lastInsertId();//if this works i am a fucking genius
            $stmt2 = $this->connection->prepare("INSERT INTO sessions (restaurantId, event_id) 
            VALUES (:restaurantId, :event_id)");
            
            $stmt2->bindValue(':restaurantId', $session->getRestaurantId(), PDO::PARAM_STR);
            $stmt2->bindValue(':event_id', $eventId);

            $stmt2->execute();

            $sessionId = $this->connection->lastInsertId(); //if THIS works i am even more of a fucking genius
            $stmt3 = $this->connection->prepare("UPDATE events SET title = :title WHERE id = :id");
            $stmt3->bindValue(':title', $this->getRestaurantName($sessionId));
            $stmt3->bindValue(':id', $eventId);
            $stmt3->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateSession(Session $session) {
        try {
            // Update event record
            $stmt = $this->connection->prepare("UPDATE events 
            SET date = :date, start_time = :startTime, end_time = :endTime, seats = :seats, price = :price 
            WHERE id = :id");
            $stmt->bindValue(':id', $session->getEventId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $session->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $session->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $session->getEndTime(), PDO::PARAM_STR);
            $stmt->bindValue(':seats', $session->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':price', $session->getPrice(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteSession(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id"); //IF the foreign keys are set correctly, this *should* work
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch  (PDOException $e) {
            echo $e;
        }
    }
}

?>