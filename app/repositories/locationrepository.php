<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/location.php';

class LocationRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tourLocations");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            $location = $stmt->fetchAll();

            return $location;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tourLocations WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            $location = $stmt->fetchAll();

            return $location;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>