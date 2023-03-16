<?php
require __DIR__ . '/../../services/ticketservice.php';

class TicketController
{

    private $ticketService;

    function __construct()
    {
        $this->ticketService = new TicketService();
    }

    public function index()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $dance = null;
            $jazz = null; 
            if (isset($_GET["dance"]) ) {
                $dance = $_GET["dance"];
                // $jazz = $_GET["jazz"];
            }

            $tickets = $this->ticketService->getAll($dance, $jazz);
            echo json_encode($tickets);
        }
    }

}
?>