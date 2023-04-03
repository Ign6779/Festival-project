<?php
require_once __DIR__ . '/controller.php';

class TicketController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        require __DIR__ . '/../views/ticket/ticket.php';
    }
}
?>