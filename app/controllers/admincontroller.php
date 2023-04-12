<?php
require_once __DIR__ . '/controller.php';

class AdminController extends Controller
{

    function __construct()
    {

    }

    public function index()
    {
        require __DIR__ . '/../views/admin/users/index.php';
    }

    
}
?>