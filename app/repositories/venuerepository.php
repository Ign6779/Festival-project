<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/venue.php';

class VenueRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM venue");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Venue');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($venueName, $venueLocation)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO venue (id, name, location) VALUES (NULL, :name, :loc)");
            $stmt->bindParam(':name', $venueName);
            $stmt->bindParam(':loc', $venueLocation);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM venue WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Venue');
            $venue = $stmt->fetch();

            return $venue;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($id, $venueName, $venueLocation)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE venue SET `name`=:name,`location`=:loc WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $venueName);
            $stmt->bindParam(':loc', $venueLocation);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($venueId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM venue WHERE id = :id");
            $stmt->bindParam(':id', $venueId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>