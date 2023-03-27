<?php
require __DIR__ . 'repository.php';
require __DIR__ . '/../models/session.php';

class SessionRepository extends Repository {
    public function getAll() {
        $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime, s.* 
        FROM sessions s
        LEFT JOIN events e ON e.id = s.event_id");
        $stmt->execute();

        $sessions = [];

        while ($row = $stmt->fetch()) {
            $session = new Session();
            $session->setId($row['id']);
            $session->setDate($row['date']);
            $session->setStartTime($row['startTime']);
            $session->setEndTime($row['endTime']);
            $session->setSeats($row['seats']);
            $session->setPrice($row['price']);

            $sessions[] = $session;
        }

        return $sessions;
    }

    public function getById(int $id) {
        $stmt = $this->connection->prepare("SELECT e.date, e.start_time as startTime, e.end_time as endTime, s.* 
        FROM sessions s
        LEFT JOIN events e ON e.id = s.event_id
        WHERE s.id = ?");
        $stmt->execute([$id]);

        $session = new Session();

        while ($row = $stmt->fetch()) {
            $session->setId($row['id']);
            $session->setDate($row['date']);
            $session->setStartTime($row['startTime']);
            $session->setEndTime($row['endTime']);
            $session->setSeats($row['seats']);
            $session->setPrice($row['price']);
        }

        return $session;
    }

    public function AddSession(Session $session) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO ")
        }
    }
}