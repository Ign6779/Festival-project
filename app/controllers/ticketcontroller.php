<?php
require __DIR__ . '/controller.php';

class TicketController extends Controller {

    public function index(){
        require __DIR__ . '/../views/ticket/ticket.php';
    }

}
?>