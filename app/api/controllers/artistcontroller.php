<?php
require __DIR__ . '/../../services/artistservice.php';

class ArtistController 
{
    private $artistService;

    function __construct()
    {
        $this->artistService = new ArtistService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $venues = $this->artistService->getAll();
            echo json_encode($venues);
        }
    }

    public function deleteArtist()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['artistid']);
            $this->artistService->delete($id);
        }
    }
}


?>