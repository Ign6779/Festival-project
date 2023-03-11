<?
function returnStyle($id)
{
    $style = "";
    $uri = $_SERVER['REQUEST_URI'];
    $splitUri = explode('/', $uri);
    if ($uri == $id || ($splitUri[1] == "festival" && $id == "festival")) {
        $style = "bg-white txt-color-bleu";
    } else {
        $style = "bg-bleu txt-color-white";
    }
    return $style;
}

function returnSelected($id)
{
    $selected = "";
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri == $id) {
        $selected = "selected";
    }

    return $selected;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haarlem festival</title>
    <link rel="stylesheet" href="/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/kids.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/jazz.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/history.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/dance.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/overview.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/header.css?v=<?php echo time(); ?>">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font families  -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Corben" />
    <link href='https://fonts.googleapis.com/css?family=Mandali' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Baloo+Chettan' rel='stylesheet'>
    <script src="https://hammerjs.github.io/dist/hammer.js"></script>
</head>

<body>

    <nav>
        <div class="nav-section1">
            <div class="language-options">
                <img src="/img/english-option.png" alt="english-option">
                <img src="/img/dutch-option.png" alt="dutch-option">
            </div>
        </div>

        <div class="nav-section2">

            <div id="menu-list" class="menu-list">
                <a href="/" class="remove-style menu-list-option <? echo returnStyle("/"); ?>">Home</a>

                <select name="Events" id="Events" onchange="redirct(this.value)"
                    class="menu-list-option <? echo returnStyle("festival"); ?>">
                    <option <? echo returnSelected("/"); ?> disabled>Events</option>
                    <option <? echo returnSelected("/festival/overview"); ?> value="/festival/overview">Festival
                    </option>
                    <option <? echo returnSelected("/festival/yummy"); ?> value="/festival/yummy">Dining</option>
                    <option <? echo returnSelected("/festival/history"); ?> value="/festival/history">History
                    </option>
                    <option <? echo returnSelected("/festival/dance"); ?> value="/festival/dance">Dance</option>
                    <option <? echo returnSelected("/festival/jazz"); ?>value="/festival/jazz">Jazz</option>
                    <option <? echo returnSelected("/festival/kids"); ?> value="/festival/kids">Kids</option>
                </select>

                <a href="/tickets" class="remove-style menu-list-option <? echo returnStyle("tickets"); ?>">Tickets</a>
            </div>


            <div class="logo">
                <img src="/img/logo-of-page.png" alt="Logo">
            </div>

            <div>
                <input type="text" class="search-input" placeholder="Search here ...">

                <button class="search-button">
                    <img src="/img/search-icon2.png" alt="search icon">
                </button>
            </div>

            <div class="cart-and-items">

                <button class="cart" onclick="showItemsInCart()">
                    <img id="cart-icon-img" src="/img/cart-icon.png" alt="cart-icon">
                </button>


                <div id="items-in-cart" class="items-in-cart">
                    My cart
                </div>
            </div>



        </div>
    </nav>

    <script>
        function redirct(src) {
            window.location = src;
        }

        function showItemsInCart() {
            var x = document.getElementById("items-in-cart");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>