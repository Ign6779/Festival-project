<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/jazz.php';

class JazzRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT j.*, v.name AS venueName, v.location,a.id as artistId, a.name AS artistName, e.date, e.start_time as startTime, e.end_time as endTime
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
                    $jazzEvent->setAvailableTickets($row['availableTickets']);
                    $jazzEvent->setPrice($row['price']);

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
            $stmt = $this->connection->prepare("SELECT j.*, v.name AS venueName, v.location,a.id as artistId, a.name AS artistName, a.description AS artistDes, i.image AS source, e.date , e.start_time as startTime, e.end_time as endTime
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
                    $jazzEvent->setAvailableTickets($row['availableTickets']);
                    $jazzEvent->setPrice($row['price']);
                    $jazzEvent->setImgSource($row['source']);

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
}
?>