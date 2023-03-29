<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/dance.php';

class DanceRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT d.*, v.name AS venueName, v.location, a.id as artistId, a.name AS artistName , e.date , e.start_time as startTime , e.end_time as endTime, e.seats AS availableTickets
            FROM dance d 
            LEFT JOIN venue v ON d.venueId = v.id 
            LEFT JOIN danceArtist da ON d.id = da.danceId 
            LEFT JOIN artist a ON da.artistId = a.id
            LEFT JOIN events e ON e.id= d.event_id;");
            $stmt->execute();

            $danceEvents = [];
w
            while ($row = $stmt->fetch()) {
                $danceEventId = $row['id'];

                if (!isset($danceEvents[$danceEventId])) {
                    $danceEvent = new DanceEvent();
                    $danceEvent->setId($row['id']);
                    $danceEvent->setDate($row['date']);
                    $danceEvent->setStartTime($row['startTime']);
                    $danceEvent->setEndTime($row['endTime']);
                    $danceEvent->setSession($row['session']);
                    $danceEvent->setAvailableTickets($row['availableTickets']);
                    $danceEvent->setPrice($row['price']);

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
}