<?php
require __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/eventservice.php';

class CartController extends Controller
{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index()
    {

        if (isset($_GET['aParam'])) {
            $data = $_GET['aParam'];
            $items = array();
            $cart = array();
            foreach ($data as $productId => $qnt) {
                $item = $this->eventService->getById($productId);
                array_push($items, $item);
                $cart[$productId] = $qnt;
            }
            $_SESSION['cart'] = $cart;
            require __DIR__ . '/../views/cart/index.php';
        }

    }


}
?>