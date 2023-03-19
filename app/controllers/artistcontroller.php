<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/artistservice.php';

class ArtistController extends Controller {

    private $artistService;

    public function __construct(){
        $this->artistService = new ArtistService();
    }


    public function index(){
        $artists = $this->artistService->getAll();
        require __DIR__ . '/../views/festival/dance.php';
    }
}
?>