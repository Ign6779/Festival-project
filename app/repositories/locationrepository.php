<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/location.php';

class LocationRepository extends Repository
{
    public function getAll()
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

    public function getOne($id)
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

    public function createLocation(Location $location) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO tourLocations (name, location, description, img) 
            VALUES (:name, :location, :description, :img)");

            $stmt->bindValue(':name', $location->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':location', $location->getLocation(), PDO::PARAM_STR);
            $stmt->bindValue(':description', $location->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':img', $location->getImage(), PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateLocation(Location $location) {
        try {
            $stmt = $this->connection->prepare("UPDATE tourLocations 
            SET name = :name, location = :location, description = :description, img = :img 
            WHERE id = :id");

            $stmt->bindValue(':name', $location->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':location', $location->getLocation(), PDO::PARAM_STR);
            $stmt->bindValue(':description', $location->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':img', $location->getImage(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteLocation(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM tourLocations 
            WHERE id = :id");
    
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>