<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/artist.php';

class ArtistRepository extends Repository
{
    function getAll()
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

    function insertArtist($name, $description, $song, $topSong)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO artist (id, name, description, song, top_song) VALUES (NULL, :name, :des, :song, :top_song)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':des', $description);
            $stmt->bindParam(':song', $song);
            $stmt->bindParam(':top_song', $topSong);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insetImage($artistId, $image)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `artistImages`(`id`, `artist_id`, `image`) VALUES (NULL, :artist_id, :img)");
            $stmt->bindParam(':artist_id', $artistId);
            $stmt->bindParam(':img', $image);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM artist WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
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
            }
            return $artist;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getByname($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM artist WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
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
            }
            return $artist;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($id, $name, $description, $song, $topSong)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE artist SET name=:name, description=:des, song=:song, top_song=:topsong WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':des', $description);
            $stmt->bindParam(':song', $song);
            $stmt->bindParam(':topsong', $topSong);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($artistid)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM artist WHERE id = :id");
            $stmt->bindParam(':id', $artistid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>