<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/jazz.php';

class JazzRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT j.*, v.name AS venueName, v.location,a.id as artistId, a.name AS artistName, e.date, e.start_time as startTime, e.end_time as endTime, e.seats as availableTickets, e.price AS price, e.id AS event_id 
            FROM jazz j 
            LEFT JOIN venue v ON j.venueId = v.id 
            LEFT JOIN jazzArtist ja ON j.id = ja.jazzId 
            LEFT JOIN artist a ON ja.artistId = a.id
            LEFT JOIN events e on e.id = j.event_id;");
            $stmt->execute();

            $jazzEvents = [];

            while ($row = $stmt->fetch()) {
                $jazzEventId = $row['id'];

                if (!isset($jazzEvents[$jazzEventId])) {
                    $jazzEvent = new JazzEvent();
                    $jazzEvent->setId($row['id']);
                    $jazzEvent->setDate($row['date']);
                    $jazzEvent->setStartTime($row['startTime']);
                    $jazzEvent->setEndTime($row['endTime']);
                    $jazzEvent->setSeats($row['availableTickets']);
                    $jazzEvent->setPrice($row['price']);
                    $jazzEvent->setEventId($row['event_id']);

                    $venue = new Venue();
                    $venue->setId($row['venueId']);
                    $venue->setName($row['venueName']);
                    $venue->setLocation($row['location']);

                    $jazzEvent->setVenue($venue);

                    $jazzEvents[$jazzEventId] = $jazzEvent;
                }

                $artist = new Artist();
                $artist->setId($row['artistId']);
                $artist->setName($row['artistName']);
                $jazzEvents[$jazzEventId]->addArtist($artist);
            }

            return array_values($jazzEvents);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getBasicInfo() {
        try {
            $stmt = $this->connection->prepare("SELECT e.title, e.date, e.start_time as startTime, e.end_time as endTime, j.*, e.seats, e.price 
            FROM jazz j
            LEFT JOIN events e ON e.id = j.event_id");

            $stmt->execute();

            $jazzevents = [];
            while ($row = $stmt->fetch()) {
                $jazz = new JazzEvent();
                $jazz->setId($row['id']);
                $jazz->setTitle($row['title']);
                $jazz->setDate($row['date']);
                $jazz->setStartTime($row['startTime']);
                $jazz->setEndTime($row['endTime']);
                $jazz->setSeats($row['seats']);
                $jazz->setPrice($row['price']);
                $jazz->setEventId($row['event_id']);
                $jazz->setVenueId($row['venueId']);
                
                $jazzevents[] = $jazz;
            }
            return $jazzevents;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById(int $id) {
        try {
            $stmt = $this->connection->prepare("SELECT e.title, e.date, e.start_time as startTime, e.end_time as endTime, j.*, e.seats, e.price 
            FROM jazz j
            LEFT JOIN events e ON e.id = j.event_id 
            WHERE j.id = :id");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $jazz = new JazzEvent();

            while ($row = $stmt->fetch()) {
                $jazz->setId($row['id']);
                $jazz->setTitle($row['title']);
                $jazz->setDate($row['date']);
                $jazz->setStartTime($row['startTime']);
                $jazz->setEndTime($row['endTime']);
                $jazz->setSeats($row['seats']);
                $jazz->setPrice($row['price']);
                $jazz->setEventId($row['event_id']);
                $jazz->setVenueId($row['venueId']);
            }
            return $jazz;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getDatesOfEvents()
    {
        try {
            $stmt = $this->connection->prepare("SELECT date 
            FROM events WHERE event_type= 'jazz' GROUP BY date");
            $stmt->execute();

            $dates = [];
            $count = 0;

            while ($row = $stmt->fetch()) {
                $dates[$count] = $row['date'];
                $count++;
            }
        } catch (PDOException $e) {
            echo $e;
        }

        return $dates;
    }

    public function getByDate($date)
    {
        try {
            $stmt = $this->connection->prepare("SELECT j.*, v.name AS venueName, v.location,a.id as artistId, a.name AS artistName, a.description AS artistDes, i.image AS source, e.date , e.start_time as startTime, e.end_time as endTime, e.price AS price, e.id AS event_id 
            FROM jazz j
            LEFT JOIN venue v ON j.venueId = v.id 
            LEFT JOIN jazzArtist ja ON j.id = ja.jazzId 
            LEFT JOIN artist a ON ja.artistId = a.id
            LEFT JOIN `artistImages` i ON ja.artistId = i.artist_id
            LEFT JOIN events e on e.id= j.event_id
            WHERE e.date = :i;");
            $stmt->bindParam(':i', $date);
            $stmt->execute();

            $jazzEvents = [];

            while ($row = $stmt->fetch()) {
                $jazzEventId = $row['id'];

                if (!isset($jazzEvents[$jazzEventId])) {
                    $jazzEvent = new JazzEvent();
                    $jazzEvent->setId($row['id']);
                    $jazzEvent->setDate($row['date']);
                    $jazzEvent->setStartTime($row['startTime']);
                    $jazzEvent->setEndTime($row['endTime']);
                    $jazzEvent->setPrice($row['price']);
                    $jazzEvent->setImgSource($row['source']);
                    $jazzEvent->setEventId($row['event_id']);

                    $venue = new Venue();
                    $venue->setId($row['venueId']);
                    $venue->setName($row['venueName']);
                    $venue->setLocation($row['location']);

                    $jazzEvent->setVenue($venue);

                    $jazzEvents[$jazzEventId] = $jazzEvent;
                }

                $artist = new Artist();
                $artist->setId($row['artistId']);
                $artist->setName($row['artistName']);
                $artist->setDescription($row['artistDes']);
                $artist->setSong("");
                $artist->setTopSong("");
                $image = new Image();
                $image->setId(100);
                $image->setName("");
                $image->setArtistId(100);
                $artist->addImage($image);

                $jazzEvents[$jazzEventId]->addArtist($artist);
            }

            return array_values($jazzEvents);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getArtists()
    {
        try {
            $stmt = $this->connection->prepare("SELECT artist.id, artist.name AS name, artist.description AS description, artist.song AS song, artist.top_song AS top_song, artist.Type AS type, artistImages.image AS artistImage, artistImages.id AS imageId FROM artist INNER JOIN artistImages ON artist.id = artistImages.artist_id;");
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
                    $artist->setType($row['type']);
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

    public function createJazz(JazzEvent $jazz) {
        try {
            $stmt1 = $this->connection->prepare("INSERT INTO events (title, date, start_time, end_time, event_type, seats, price)
            VALUES (:title, :date, :start_time, :end_time, :event_type, :seats, :price)");

            $stmt1->bindValue(':title', $jazz->getTitle(), PDO::PARAM_STR);
            $stmt1->bindValue(':date', $jazz->getDate(), PDO::PARAM_STR);
            $stmt1->bindValue(':start_time', $jazz->getStartTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':end_time', $jazz->getEndTime(), PDO::PARAM_STR);
            $stmt1->bindValue(':event_type', 'jazz');
            $stmt1->bindValue(':seats', $jazz->getSeats(), PDO::PARAM_INT);
            $stmt1->bindValue(':price', $jazz->getPrice(), PDO::PARAM_STR);

            $stmt1->execute();

            $eventId = $this->connection->lastInsertId();//if this works i am a fucking genius
            $stmt2 = $this->connection->prepare("INSERT INTO jazz (venueId, event_id) 
            VALUES (:venueId, :event_id)");
            
            $stmt2->bindValue(':venueId', $jazz->getVenueId(), PDO::PARAM_STR);
            $stmt2->bindValue(':event_id', $eventId);

            $stmt2->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateJazz(JazzEvent $jazz) {
        try {
        $stmt = $this->connection->prepare("UPDATE events 
            SET title = :title, date = :date, start_time = :startTime, end_time = :endTime, seats = :seats, price = :price 
            WHERE id = :eventId");

            $stmt->bindValue(':title', $jazz->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':eventId', $jazz->getEventId(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $jazz->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':startTime', $jazz->getStartTime(), PDO::PARAM_STR);
            $stmt->bindValue(':endTime', $jazz->getEndTime(), PDO::PARAM_STR);
            $stmt->bindValue(':seats', $jazz->getSeats(), PDO::PARAM_INT);
            $stmt->bindValue(':price', $jazz->getPrice(), PDO::PARAM_STR);
            
            $stmt->execute();

            $stmt = $this->connection->prepare("UPDATE jazz 
            SET venueId = :venueId  
            WHERE id = :id");

            $stmt->bindValue(':venueId', $jazz->getVenueId(), PDO::PARAM_STR);
            $stmt->bindVAlue(':id', $jazz->getId(), PDO::PARAM_INT);

            $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
    }}

    public function deleteJazz(int $id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>