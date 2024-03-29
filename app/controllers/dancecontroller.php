<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/danceservice.php';

class DanceController extends Controller {

    private $danceService;

    public function __construct(){
        $this->danceService = new DanceService();
    }


    public function index(){
        $danceEvents = $this->danceService->getAll();
        $artists = $this->danceService->getArtists();
        require __DIR__ . '/../views/festival/dance.php';
    }
}
?>