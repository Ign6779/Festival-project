<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userservice.php';

class LoginController extends Controller{
    public function index(){
        //i don't if is needed...1
    }

    public function login(){
        require __DIR__ . '/../views/login/login.php';
    }

    public function register(){
        require __DIR__ . '/../views/login/register.php';
    }

    public function forgotpassword(){
        require __DIR__ . '/../views/login/forgotpassword.php';
    }
}
?>