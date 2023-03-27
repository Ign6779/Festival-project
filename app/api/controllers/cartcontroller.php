<?php
require_once __DIR__ . '/../../services/cartservice.php';
class CartController
{
    private $cartService;
    function __construct()
    {
        $this->cartService = new CarteService();
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
        if (isset($_GET['phoneId'])) {
            $id = htmlspecialchars($_GET['phoneId']);
            $cart = $this->cartService->increaseQuantity($id);
            header('Content-Type: application/json');
            echo json_encode($cart);
        }
    }

    function decreaseQuantity()
    {
        if (isset($_GET['phoneId'])) {
            $id = htmlspecialchars($_GET['phoneId']);
            $cart = $this->cartService->decreaseQuantity($id);
            header('Content-Type: application/json');
            echo json_encode($cart);
        }

    }

}