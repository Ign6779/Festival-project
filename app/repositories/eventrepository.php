<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/event.php';

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

    function getOne($id)
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
}
?>