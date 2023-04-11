<?
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../repositories/ticketorderrepository.php';
require_once __DIR__ . '/../repositories/eventrepository.php';
use Ramsey\Uuid\Uuid;

class TicketOrderService
{
    private $ticketOrderRepository;
    private $eventRepository;

    public function __construct()
    {
        $this->ticketOrderRepository = new TicketOrderRepository();
        $this->eventRepository = new EventRepository();
    }

    public function getAll()
    {
        $ticketOrder = $this->ticketOrderRepository->getAll();
        return $ticketOrder;
    }

    public function insertOrderTicket($orderTicket)
    {
        $this->ticketOrderRepository->insertOrderTicket($orderTicket);
    }

    public function getItemsByOrderId($order_id)
    {
        return $this->ticketOrderRepository->getItemsByOrderId($order_id);
    }

    public function changeScannedStatus($id)
    {
        return $this->ticketOrderRepository->changeScannedStatus($id);
    }

    public function getScannerInformation($id)
    {
        return $this->ticketOrderRepository->getScannerInformation($id);
    }

    public function insertOrderItems($order)
    {
        $cart = $_SESSION['cart'];
        foreach ($cart as $productid => $quantity) {
            for ($i = 0; $i < $quantity; $i++) {
                $ticketOrder = new TicketOrder();
                $ticketOrder->setOrder($order);
                $ticketOrder->setEvent($this->eventRepository->getById($productid));
                $ticketOrder->setUuId(Uuid::uuid4()->toString());
                $ticketOrder->setIsScanned(false);
                $this->ticketOrderRepository->insertOrderTicket($ticketOrder);
            }

        }
    }
    public function totalAmount()
    {
        $amount = 0;
        $cart = $_SESSION['cart'];
        foreach ($cart as $productid => $qnt) {
            $item = $this->eventRepository->getById($productid);
            $amount += $item->getPrice() * $qnt;
        }
        return $amount;
    }
}
?>