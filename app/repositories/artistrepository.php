<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/artist.php';

class ArtistRepository extends Repository
{
    function getAll()
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

    function insertArtist($name, $description, $song, $topSong, $type)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO artist (id, name, description, song, top_song, Type) VALUES (NULL, :name, :des, :song, :top_song, :type)"); // Add :type parameter
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':des', $description);
            $stmt->bindParam(':song', $song);
            $stmt->bindParam(':top_song', $topSong);
            $stmt->bindParam(':type', $type);
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
            $stmt = $this->connection->prepare("SELECT artist.id, artist.name AS name, artist.description AS description, artist.song AS song, artist.top_song AS top_song, artistImages.image AS artistImage, artistImages.id AS imageId, artist.Type AS type FROM `artist` 
            inner JOIN artistImages on artistImages.artist_id= artist.id where artist.id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $images = [];
            while ($row = $stmt->fetch()) {
                $artist = new Artist();
                $artist->setId($row['id']);
                $artist->setName($row['name']);
                $artist->setType($row['type']);
                if ($row['song'] == null && $row['top_song'] == null) {
                    $artist->setSong("");
                    $artist->setTopSong("");
                } else {
                    $artist->setSong($row['song']);
                    $artist->setTopSong($row['top_song']);
                }
                $artist->setDescription($row['description']);
                $image = new Image();
                $image->setId($row['imageId']);
                $image->setName($row['artistImage']);
                $image->setArtistId($row['id']);
                array_push($images, $image);
            }
            $artist->setImages($images);
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
                $artist->setType($row['Type']);
            }
            return $artist;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function update($id, $name, $description, $song, $topSong, $type)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE artist SET name=:name, description=:des, song=:song, top_song=:topsong, Type=:type WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':des', $description);
            $stmt->bindParam(':song', $song);
            $stmt->bindParam(':topsong', $topSong);
            $stmt->bindParam(':type', $topSong);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateImage($artistId, $imageId, $name)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `artistImages` SET image= :name WHERE id =:imageId");
            $stmt->bindParam(':imageId', $imageId);
            $stmt->bindParam(':name', $name);
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

    function deletePictures($artistid)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `artistImages` WHERE artist_id = :id");
            $stmt->bindParam(':id', $artistid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>