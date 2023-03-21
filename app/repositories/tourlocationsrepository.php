<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tourLocations.php';

class TourLocationsRepository extends Repository{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tourLocations");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'TourLocations');
            $tourLocations = $stmt->fetchAll();

            return $tourLocations;
        }
        catch (PDOException $e){
            echo $e;
        }
    }

    function getById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tourLocations WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'TourLocations');
            $tour = $stmt->fetch();

            return $tour;
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}

?>