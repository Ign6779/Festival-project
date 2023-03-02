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
    <link rel="stylesheet" href="/css/dance.css?v=<?php echo time(); ?>">

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

            <div class="menu-list">

                <div class="selected-page text-in-selected-page">
                    <a href="/" class="remove-style">Home</a>
                </div>

                <div>
                    <select name="Events" id="Events" onchange="redirct(this.value)"
                        class="remove-style drop-down-menu text-in-drop-down-menu">
                        <option selected disabled>Events</option>
                        <option value="/festival/overview">Festival</option>
                        <option value="/festival/yummy">Dining</option>
                        <option value="/festival/history">History</option>
                        <option value="/festival/dance">Dance</option>
                        <option value="/festival/jazz">Jazz</option>
                        <option value="/festival/kids">Kids</option>
                    </select>
                </div>

                <div class="unselected-page text-in-unselected-page">
                    <a href="festival/tickets" class="remove-style ">Tickets</a>
                </div>

            </div>

            <div name="Logo" class="logo">
                <img src="/img/logo-of-page.png" alt="Logo">
            </div>



            <div name="search">
                <input type="text" class="search-input" placeholder="Search here ...">

                <button class="search-button">
                    <img class="search-button-picture" src="/img/search-icon2.png" alt="search icon">
                </button>
            </div>

            <div name="cart" class="cart-and-items">

                <button class="cart" onclick="showItemsInCart()">
                    <img src="/img/cart-icon.png" alt="cart-icon">
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