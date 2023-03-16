<?php
require __DIR__ . '/../repositories/ticketrepository.php';


class TicketService
{
    private $repository;

    function __construct()
    {
        $this->repository = new TicketRepository();
    }

    public function getAll($dance = NULL, $jazz = NULL)
    {
        return $this->repository->getAll($dance , $jazz);
    }

}
?>