<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/jazzservice.php';

class JazzController extends Controller
{

    private $jazzService;

    public function __construct()
    {
        $this->jazzService = new JazzService();
    }


    public function index()
    {
        $events = $this->jazzService->getAll();
        $dates = $this->jazzService->getDatesOfEvents();
        $artists = $this->jazzService->getArtists();
        require __DIR__ . '/../views/festival/jazz.php';
    }
}
?>