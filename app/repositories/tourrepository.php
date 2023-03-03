<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/tour.php';

class TourRepository extends Repository {
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tours");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
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

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
            $tour = $stmt->fetch();

            return $tour;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}

?>