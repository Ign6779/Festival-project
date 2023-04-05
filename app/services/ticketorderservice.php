
<?php
require __DIR__ . '/../repositories/ticketorderrepository.php';
class TicketOrderService{
    private $repository;

    public function __construct(){
        $this->repository = new TicketOrderRepository();
    }

    public function getAll(){
        $ticketOrder=$this->repository->getAll();
        return $ticketOrder;
    }

    public function insertOrderTicket($orderTicket){
        $this->repository->insertOrderTicket($orderTicket);
    }
}
?>