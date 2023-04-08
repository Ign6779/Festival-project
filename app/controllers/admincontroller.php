<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/artistservice.php';

class AdminController extends Controller
{
    private $artistService;

    function __construct()
    {
        $this->artistService = new ArtistService();
    }

    public function index()
    {
        $artists = $this->artistService->getAll();
        require __DIR__ . '/../views/admin/index.php';
    }

    
}
?>