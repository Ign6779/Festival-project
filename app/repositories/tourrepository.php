<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/tour.php';

class TourRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime,  t.* 
            FROM tours t
            LEFT JOIN events e ON e.id = t.event_id;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
            $tours = $stmt->fetchAll();

            return $tours;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM tours WHERE id = ?");
            $stmt->execute([$id]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
            $tour = $stmt->fetch();

            return $tour;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>