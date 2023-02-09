<?php
require __DIR__ . '/controller.php';

class HomepageController extends Controller {
    public function index(){
        require __DIR__ . '/../views/home/homepage.php';
    }
}
?>