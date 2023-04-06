<?
require __DIR__ . '/../repositories/ticketorderrepository.php';
class TicketOrderService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new TicketOrderRepository();
    }

    public function getAll()
    {
        $ticketOrder = $this->repository->getAll();
        return $ticketOrder;
    }

    public function insertOrderTicket($orderTicket)
    {
        $this->repository->insertOrderTicket($orderTicket);
    }

    public function getItemsByOrderId($order_id)
    {
        return $this->repository->getItemsByOrderId($order_id);
    }
}
?>