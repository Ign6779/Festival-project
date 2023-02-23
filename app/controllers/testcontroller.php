<?php
require __DIR__ . '/controller.php';

class TestController extends Controller {
    public function index(){
        require __DIR__ . '/../views/festival/test.php';
    }
}