<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/kidsservice.php';


class KidsController extends Controller {

    private $kidsService;

    public function __construct(){
        $this->kidsService = new KidsService();
    }


    public function index(){
        $kidsActivities= $this->kidsService->getAll();
        require __DIR__ . '/../views/festival/kids.php';
    }
}
?>