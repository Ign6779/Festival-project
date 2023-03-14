<?php
require __DIR__ . '/controller.php';

class DanceController extends Controller {

    //private $userService;

    public function __construct(){
        //$this->userService = new UserService();
    }


    public function index(){
        require __DIR__ . '/../views/festival/dance.php';
    }
}
?>