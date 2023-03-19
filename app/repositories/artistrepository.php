<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/artist.php';


class ArtistRepository extends Repository {
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT artist.id, artist.name, artistImages.artist_id, artistImages.image
            FROM artist
            JOIN artistImages ON artist.id = artistImages.artist_id;");
            $stmt->execute();

            $artists = [];

            while ($row = $stmt->fetch()) {
                $artistId = $row['id'];
                if (!isset($artists[$artistId])) { 
                    $artist = new Artist();
                    $artist->setId($row['id']);
                    $artist->setName($row['name']);
                    $artist->setSong($row['song']);
                    $artist->setTopSong($row['top_song']);
                    $artist->setDescription($row['description'])

                    $artists[$artistId] = $artist;
                }
                $image = new Image();
                $image->setId($row['id']);
                $image->setName($row['image']);
                $image->setArtistId($row['artist_id']);

                $artists[$artistId]->addImage($image);
            }

            return array_values($artists);
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}