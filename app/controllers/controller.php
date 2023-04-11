<?php
require_once __DIR__ . '/../services/eventservice.php';
class Controller
{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();

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
        }
    }

    function displayView($model)
    {
        $directory = substr(get_class($this), 0, -10);
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }

}
?>