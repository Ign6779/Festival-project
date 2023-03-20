<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/jazz.php';

class JazzRepository extends Repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT j.*, v.name AS venueName, v.location,a.id as artistId, a.name AS artistName 
            FROM jazz j 
            LEFT JOIN venue v ON j.venueId = v.id 
            LEFT JOIN jazzArtist ja ON j.id = ja.jazzId 
            LEFT JOIN artist a ON ja.artistId = a.id;");
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
            FROM jazz GROUP BY date");
            $stmt->execute();

            $dates = [];
            $count = 0;

            while ($row = $stmt->fetch()) {
                $dates[$count] = $row['date'];
                $count++;
            }
        }
        catch (PDOException $e) {
            echo $e;
        }

        return $dates;
    }
}
?>