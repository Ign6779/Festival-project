<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/tour.php';

class TourRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime,  t.*, e.seats FROM tours t
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

    function createTour(Tour $tour) {
        try {
            $stmt1 = $this->connection->prepare("INSERT INTO events (date, start_time, end_time, event_type, seats)
            VALUES (:date, :start_time, :end_time, :event_type, :seats)");

            $stmt1->bindValue(':date', $tour->getDate(), PDO::PARAM_STR);
            $stmt1->bindValue(':start_time', $tour->getStartTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':end_time', $tour->getEndTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':event_type', 'history');
            $stmt1->bindValue(':seats', $tour->getSeats(), PDO::PARAM_INT);

            $stmt1->execute();

            $eventId = $this->connection->lastInsertId();
            $stmt2 = $this->connection->prepare("INSERT INTO tours (event_id, language) 
            VALUES (:eventId, :language)");
            
            $stmt2->bindValue(':eventId', $eventId, PDO::PARAM_INT);
            $stmt2->bindValue(':language', $tour->getLanguage(), PDO::PARAM_STR);

            $stmt2->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateTour(Tour $tour) {
        try {
            $stmt = $this->connection->prepare("UPDATE events 
            SET date = :date, start_time = :startTime, end_time = :endTime 
            WHERE id = :id");
            $stmt->bindValue(':id', $tour->getEventId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $tour->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $tour->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $tour->getEndTime(), PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $this->connection->prepare("UPDATE tours SET language = :language WHERE id = :id");
            $stmt->bindValue(':id', $tour->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':language', $tour->getLanguage(), PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteTour(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id"); //IF the foreign keys are set correctly, this *should* work
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch  (PDOException $e) {
            echo $e;
        }
    }
}

?>