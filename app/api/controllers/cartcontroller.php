<?php
require_once __DIR__ . '/../../services/cartservice.php';
require_once __DIR__ . '/../../services/ticketservice.php';
class CartController
{
    private $cartService;
    private $ticketService;
    function __construct()
    {
        $this->cartService = new CarteService();
        $this->ticketService = new TicketService();
    }

    function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $cart = $this->cartService->getAll();
            echo json_encode($cart);
        }
    }

    function addToCart()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = htmlspecialchars($_GET['ticketId']);
            $quantity = htmlspecialchars($_GET['qnt']);
            $cart = $this->cartService->addToCart($id, $quantity);

            header('Content-Type: application/json');
            echo json_encode($cart);
        }

    }

    function cartCount()
    {
        $count = $this->cartService->cartCount();
        header('Content-Type: application/json');
        echo json_encode($count);
    }

    function increaseQuantity()
    {
        if (isset($_GET['ticketId'])) {
            $id = htmlspecialchars($_GET['ticketId']);
            $cart = $this->cartService->increaseQuantity($id);
            header('Content-Type: application/json');
            echo json_encode($cart);
        }
    }

    function decreaseQuantity()
    {
        if (isset($_GET['ticketId'])) {
            $id = htmlspecialchars($_GET['ticketId']);
            $cart = $this->cartService->decreaseQuantity($id);
            header('Content-Type: application/json');
            echo json_encode($cart);
        }

    }

    function getItemsInCart()
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }
        $items = array();
        foreach ($cart as $productid => $qnt) {
            $item = $this->ticketService->getOne($productid);
            array_push($items, $item);
        }
        echo json_encode($items);
    }

    function qantityOfItem()
    {
        $id = htmlspecialchars($_GET['ticketId']);
        $quantity = $this->cartService->qantityOfItem($id);
        echo json_encode($quantity);
    }


}