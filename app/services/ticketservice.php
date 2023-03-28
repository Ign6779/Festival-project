<?php
require __DIR__ . '/../repositories/ticketrepository.php';
class TicketService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new TicketRepository();
    }

    public function getAll()
    {
        $tickets = $this->repository->getAll();
        return $tickets;
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }
}
?>