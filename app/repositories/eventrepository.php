<?php
require __DIR__ . 'repository.php';
require __DIR__ . '/../models/event.php';

class EventRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetchAll();

            return $events;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

    function getByType($type) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events WHERE [type] = ?");
            $stmt->execute([$type]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetchAll();

            return $events;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}
?>