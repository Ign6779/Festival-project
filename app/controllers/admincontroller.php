<?php
require __DIR__ . '/controller.php';

class AdminController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        require __DIR__ . '/../views/admin/index.php';
    }

    
}
?>