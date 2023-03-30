<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/dance.php';

class DanceRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT d.*, v.name AS venueName, v.location, a.id as artistId, a.name AS artistName , e.date , e.start_time as startTime , e.end_time as endTime, e.seats AS availableTickets, e.price AS price, e.id AS event_id 
            FROM dance d 
            LEFT JOIN venue v ON d.venueId = v.id 
            LEFT JOIN danceArtist da ON d.id = da.danceId 
            LEFT JOIN artist a ON da.artistId = a.id
            LEFT JOIN events e ON e.id= d.event_id;");
            $stmt->execute();

            $danceEvents = [];

            while ($row = $stmt->fetch()) {
                $danceEventId = $row['id'];

                if (!isset($danceEvents[$danceEventId])) {
                    $danceEvent = new DanceEvent();
                    $danceEvent->setId($row['id']);
                    $danceEvent->setDate($row['date']);
                    $danceEvent->setStartTime($row['startTime']);
                    $danceEvent->setEndTime($row['endTime']);
                    $danceEvent->setSession($row['session']);
                    $danceEvent->setSeats($row['availableTickets']);
                    $danceEvent->setPrice($row['price']);
                    $danceEvent->setEventId($row['event_id']);

                    $venue = new Venue();
                    $venue->setId($row['venueId']);
                    $venue->setName($row['venueName']);
                    $venue->setLocation($row['location']);

                    $danceEvent->setVenue($venue);

                    $danceEvents[$danceEventId] = $danceEvent;
                }

                $artist = new Artist();
                $artist->setId($row['artistId']);
                $artist->setName($row['artistName']);

                $danceEvents[$danceEventId]->addArtist($artist);
            }

            return array_values($danceEvents);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getArtists()
    {
        try {
            $stmt = $this->connection->prepare("SELECT artist.id, artist.name AS name, artist.description AS description, artist.song AS song, artist.top_song AS top_song, artistImages.image AS artistImage, artistImages.id AS imageId FROM artist INNER JOIN artistImages ON artist.id = artistImages.artist_id;");
            $stmt->execute();
            $artists = [];
            while ($row = $stmt->fetch()) {
                $artistId = $row['id'];
                if (!isset($artists[$artistId])) {
                    $artist = new Artist();
                    $artist->setId($row['id']);
                    $artist->setName($row['name']);
                    if ($row['song'] == null && $row['top_song'] == null) {
                        $artist->setSong("");
                        $artist->setTopSong("");
                    } else {
                        $artist->setSong($row['song']);
                        $artist->setTopSong($row['top_song']);
                    }
                    $artist->setDescription($row['description']);
                    $artists[$artistId] = $artist;
                }
                $image = new Image();
                $image->setId($row['imageId']);
                $image->setName($row['artistImage']);
                $image->setArtistId($row['id']);

                $artists[$artistId]->addImage($image);

            }
            return array_values($artists);
        } catch (PDOException $e) {
            echo $e;
        }

    }

    public function createDance(Dance $dance) {
        try {
            $stmt1 = $this->connection->prepare("INSERT INTO events (title, date, start_time, end_time, event_type, seats, price)
            VALUES (:title, :date, :start_time, :end_time, :event_type, :seats, :price)");

            $smtm1->bindValue(':title', $dance->getSession(), PDO::PARAM_STR);
            $stmt1->bindValue(':date', $dance->getDate(), PDO::PARAM_STR);
            $stmt1->bindValue(':start_time', $dance->getStartTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':end_time', $dance->getEndTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':event_type', 'dance');
            $stmt1->bindValue(':seats', $dance->getSeats(), PDO::PARAM_INT);
            $stmt1->bindValue(':price', $dance->getPrice(), PDO::PARAM_STR);

            $stmt1->execute();

            //filling in the sessions table part
            $eventId = $this->connection->lastInsertId();//if this works i am a fucking genius
            $stmt2 = $this->connection->prepare("INSERT INTO dance (venueId, session, price, event_id) 
            VALUES (:venueId, :session, :event_id)");
            
            $stmt2->bindValue(':venueId', $dance->getVenue(), PDO::PARAM_STR);
            $smtm2->bindValue(':session', $dance->getSession(), PDO::PARAM_STR);
            $stmt2->bindValue(':event_id', $dance);

            $stmt2->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateDance(Dance $dance) {
        try {
            $stmt = $this->connection->prepare("UPDATE events 
            SET title = :title date = :date, start_time = :startTime, end_time = :endTime, seats = :seats, price = :price 
            WHERE id = :eventId");

            $stmt->bindValue(':eventId', $dance->getEventId(), PDO::PARAM_INT);
            $smtm->bindValue(':title', $dance->getSession(), PDO::PARAM_STR);
            $stmt->bindValue(':date', $dance->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $dance->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $dance->getEndTime(), PDO::PARAM_STR);
            $stmt->bindValue(':seats', $dance->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':price', $dance->getPrice(), PDO::PARAM_STR);
            
            $stmt->execute();

            $stmt = $this->connection->prepare("UPDATE dance 
            SET venueId = :venueId, session = :session 
            WHERE id = :id");
            
            $stmt->bindValue(':venueId', $dance->getVenue(), PDO::PARAM_STR);
            $smtm->bindValue(':session', $dance->getSession(), PDO::PARAM_STR);
            $stmt->bindVAlue(':id', $dance->getId(), PDO::PARAM_INT);

            $smtm->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteDance(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}