<?php
require __DIR__ . '/controller.php';

class MobileController extends Controller {
    public function index(){
        require __DIR__ . '/../views/kidsApp/index.php';
    }

    public function challenge2(){
        require __DIR__ . '/../views/kidsApp/challenge2.php';
    }

    public function challenge3(){
        require __DIR__ . '/../views/kidsApp/challenge3.php';
    }
}
?>