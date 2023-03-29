<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/event.php';

class EventRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetchAll();

            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getByType($type)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events WHERE [type] = ?");
            $stmt->execute([$type]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetchAll();

            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $event = $stmt->fetch();

            return $event;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function CreateEvent(Event $event) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO events (date, start_time, end_time, event_type, seats)
            VALUES (:date, :start_time, :end_time, :event_type, :seats)");

            $stmt->bindValue(':date', $event->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':start_time', $event->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':end_time', $event->getEndTime(), PDO::PARAM_STR);
            $stmt->bindValue(':event_type', $event->getType(), PDO::PARAM_STR);
            $stmt->bindValue(':seats', $event->getSeats(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function UpdateEvent(Event $event) {
        try {
            $stmt = $this->connection->prepare("UPDATE events 
            SET date = :date, start_time = :start_time, end_time = :end_time, event_type = :event_type, seats = :seats 
            WHERE id = :id");

            $stmt->bindValue(':date', $event->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':start_time', $event->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':end_time', $event->getEndTime(), PDO::PARAM_STR);
            $stmt->bindValue(':event_type', $event->getType(), PDO::PARAM_STR);
            $stmt->bindValue(':seats', $event->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':id', $event->getId(), PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function DeleteEvent(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>