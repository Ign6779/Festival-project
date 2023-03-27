<?php
require __DIR__ . 'repository.php';
require __DIR__ . '/../models/session.php';

class SessionRepository extends Repository {
    public function getAll() {
        $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime, s.* 
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

            $sessions[] = $session;
        }

        return $sessions;
    }

    public function getById(int $id) {
        $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime, s.* 
        FROM sessions s
        LEFT JOIN events e ON e.id = s.event_id
        WHERE s.id = ?");
        $stmt->execute([$id]);

        $session = new Session();

        while ($row = $stmt->fetch()) {
            $session->setId($row['id']);
            $session->setDate($row['date']);
            $session->setStartTime($row['startTime']);
            $session->setEndTime($row['endTime']);
            $session->setSeats($row['seats']);
            $session->setPrice($row['price']);
        }

        return $session;
    }

    public function AddSession(Session $session) {
        try {
            // Insert event record
            $stmt = $this->connection->prepare("INSERT INTO event (date, startTime, endTime, event_type) VALUES (:date, :startTime, :endTime, 'yummy')");
            $stmt->bindValue(':date', $session->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $session->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $session->getEndTime(), PDO::PARAM_STR);
            $stmt->execute();

            // Get the ID of the newly inserted event record
            $eventId = $this->connection->lastInsertId();

            // Insert session record with the event ID
            $stmt = $this->connection->prepare("INSERT INTO sessions (restaurantId, seats, price, event_id) VALUES (:seats, :price, :eventId)"); //this might be very wrong, might have to pass the restaurantId through the parameters
            $stmt->bindValue(':restaurantId', $session->getRestaurantId(), PDO::PARAM_INT);
            $stmt->bindValue(':seats', $session->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':price', $session->getPrice(), PDO::PARAM_STR);
            $stmt->bindValue(':eventId', $eventId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function UpdateSession(int $id, Session $session) {
        try {
            // Update event record
            $stmt = $this->connection->prepare("UPDATE event SET date = :date, startTime = :startTime, endTime = :endTime, event_type = 'yummy' WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':date', $session->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $session->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $session->getEndTime(), PDO::PARAM_STR);
            $stmt->execute();

            // Update session record
            $stmt = $this->connection->prepare("UPDATE sessions SET restaurant_id = :restaurantId, seats = :seats, price = :price WHERE event_id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':restaurantId', $session->getRestaurantId(), PDO::PARAM_INT);
            $stmt->bindValue(':seats', $session->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':price', $session->getPrice(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function DeleteSession(int $id) {
        try {
            // Delete session record
            $stmt = $this->connection->prepare("DELETE FROM sessions WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Delete event record
            $stmt = $this->connection->prepare("DELETE FROM event WHERE id = (SELECT eventId FROM sessions WHERE event_id = :id)");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}