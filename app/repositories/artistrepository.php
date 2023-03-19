<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/dance.php';

class ArtistRepository extends Repository {
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT artist.id, artist.name, artistImages.artist_id, artistImages.image
            FROM artist
            JOIN artistImages ON artist.id = artistImages.artist_id;");
            $stmt->execute();

            $artistImages = [];

            while ($row = $stmt->fetch()) {
                $imageId = $row['id'];
                $image = new Image();
                $image->setId($row['id']);
                $image->setName($row['image']);
                $image->setArtistId($row['artist_id']);
                $artistImages[$imageId]->addImage($image);
            }

            return array_values($danceEvents);
        }
        catch (PDOException $e) {
            echo $e;
        }
    }
}