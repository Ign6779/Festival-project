<?php
require __DIR__ . 'repository.php';
require __DIR__ . '/../models/jazz.php';

class JazzRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM jazz");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Jazz');
            $events = $stmt->fetchAll();

            return $events;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM jazz WHERE id = ?");
            $stmt->execute([$username]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Jazz');
            $event = $stmt->fetch();

            return $event;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}
?>