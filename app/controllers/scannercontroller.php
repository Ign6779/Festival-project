<?php
require __DIR__ . '/controller.php';

class ScannerController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        require __DIR__ . '/../views/employee/scanner.php';
    }

    
}
?> 