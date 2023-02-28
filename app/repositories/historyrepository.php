<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/history.php';

class HistoryRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tours");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'History');
            $tours = $stmt->fetchAll();

            return $tours;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

    function getById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tours WHERE id = ?");
            $stmt->execute([$id]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'History');
            $tour = $stmt->fetch();

            return $tour;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}