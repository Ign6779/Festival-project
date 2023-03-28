<?php
class CarteService
{

    public function getAll()
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }

        return $cart;
    }
    public function addToCart($id, $quantity)
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }
        if (in_array($id, array_keys($cart))) {
            $cart[$id] += $quantity;

        } else {
            $cart[$id] = $quantity;
        }
        $_SESSION["cart"] = $cart;

        return $_SESSION["cart"];
    }

    public function deleteFromCart($id)
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }

        if (in_array($id, array_keys($cart))) {
            unset($cart[$id]);
        }
        $_SESSION["cart"] = $cart;
    }

    public function decreaseQuantity($id)
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }
        if (in_array($id, array_keys($cart))) {
            if ($cart[$id] == 1) {
                unset($cart[$id]);
            } else {
                $cart[$id] -= 1;
            }
        }
        $_SESSION["cart"] = $cart;
        return $_SESSION["cart"];

    }

    public function increaseQuantity($id)
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }
        if (in_array($id, array_keys($cart))) {
            $cart[$id] += 1;
        }
        $_SESSION["cart"] = $cart;
        return $_SESSION["cart"];
    }

    public function cartCount()
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }
        $sum = 0;
        foreach ($cart as $product) {
            $sum += $product;
        }
        return $sum;
    }

    public function qantityOfItem($id)
    {
        $cart = array();
        if (isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        }

        $quantity = 0;
        foreach ($cart as $productid => $qnt) {
            if ($id == $productid) {
                $quantity = $qnt;
            }
        }
        return $quantity;
    }
}
?>