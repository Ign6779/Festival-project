<?php
require __DIR__ . '/controller.php';

class JazzController extends Controller {

    //private $userService;

    public function __construct(){
        //$this->userService = new UserService();
    }


    public function index(){
        require __DIR__ . '/../views/festival/jazz.php';
    }
}
?>