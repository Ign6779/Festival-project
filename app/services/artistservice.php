<?php
require __DIR__ . '/../repositories/artistrepository.php';

class ArtistService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ArtistRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function insertArtist($name, $description, $song, $topSong, $type)
    {
        $this->repository->insertArtist($name, $description, $song, $topSong, $type);
    }

    public function insetImage($artistId, $image)
    {
        $this->repository->insetImage($artistId, $image);
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    function getByname($name)
    {
        return $this->repository->getByname($name);
    }

    public function update($id, $name, $description, $song, $topSong, $type)
    {
        $this->repository->update($id, $name, $description, $song, $topSong, $type);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        $this->repository->deletePictures($id);
    }

    public function updateImage($artistId, $imageId, $name)
    {
        $this->repository->updateImage($artistId, $imageId, $name);
    }

}