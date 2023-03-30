<?
function returnStyle($id)
{
    $style = "";
    $uri = $_SERVER['REQUEST_URI'];
    $splitUri = explode('/', $uri);
    if ($uri == $id || (($splitUri[1] == "festival" || $splitUri[1] == "kids" || $splitUri[1] == "jazz" || $splitUri[1] == "dance" || $splitUri[1] == "yummy" || $splitUri[1] == "history") && $id == "festival")) {
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
    <link rel="stylesheet" href="/css/kids.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/jazz.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/history.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/dance.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/overview.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/homepage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/ticket.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/payment.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- font families  -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Corben" />
    <link href='https://fonts.googleapis.com/css?family=Mandali' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Baloo+Chettan' rel='stylesheet'>
    <script src="https://hammerjs.github.io/dist/hammer.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

    <nav>
        <div class="nav-section1">
            <div class="language-options">
                <? if (isset($_SESSION["user"])) {
                    ?>
                    <a href="/login/logout" class="btn btn-danger">Logout</a>
                <?
                } else {
                    ?>
                    <a href="/login" class="btn btn-primary">Login</a>
                <?
                }
                ?>
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
                    <option <? echo returnSelected("/festival"); ?> value="/festival">Festival
                    </option>
                    <option <? echo returnSelected("/yummy"); ?> value="/yummy">Dining</option>
                    <option <? echo returnSelected("/history"); ?> value="/history">History
                    </option>
                    <option <? echo returnSelected("/dance"); ?> value="/dance">Dance</option>
                    <option <? echo returnSelected("/jazz"); ?> value="/jazz">Jazz</option>
                    <option <? echo returnSelected("/kids"); ?> value="/kids">Kids</option>
                </select>

                <a href="/ticket" class="remove-style menu-list-option <? echo returnStyle("/ticket"); ?>">Tickets</a>
            </div>


            <div class="logo">
                <img src="/img/logo-of-page.png" alt="Logo">
            </div>

            <div class="cart-and-items">
                <button class="cart" onclick="showItemsInCart()">
                    <img id="cart-icon-img" src="/img/cart-icon.png" alt="cart-icon">
                </button>


                <div id="items-in-cart" class="items-in-cart" style="overflow:hidden; overflow-y: scroll; ">
                    My cart
                    <div id="cartamount">

                    </div>

                    <div id="items">

                    </div>

                    <div>
                        <a href="/payment" class="btn btn-primary">Payment</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <script>
        window.load = cartCount;
        function redirct(src) {
            window.location = src;
        }

        function showItemsInCart() {
            var x = document.getElementById("items-in-cart");
            var items = document.getElementById("items");
            if (x.style.display === "none") {
                x.style.display = "block";
                items.innerHTML = "";
                loadCart();

            } else {
                x.style.display = "none";
            }
        }

        function loadItems(ticketInput) {
            var items = document.getElementById("items");
            divTicket = document.createElement("div");
            ticketp = document.createElement("p");
            ticketp.innerHTML = ticketInput.title + "<br>" + ticketInput.event.date;
            aIncrease = document.createElement("a");
            aDecrease = document.createElement("a");
            input = document.createElement("input");
            input.id = "amountOfItem" + ticketInput.id;
            aIncrease.innerHTML = "+";
            aDecrease.innerHTML = "-";
            aIncrease.className = "btn btn-primary";
            aDecrease.className = "btn btn-primary";

            aIncrease.onclick = function () {
                increaseItem(ticketInput.id);
            };

            aDecrease.onclick = function () {
                decreaseItem(ticketInput.id);
            };
            divTicket.append(ticketp, aDecrease, input, aIncrease);
            items.appendChild(divTicket);
        }

        function itemCount(id) {
            var itemCount = document.getElementById("amountOfItem" + id);
            itemCount.value = "";
            fetch('http://localhost/api/cart/qantityOfItem?ticketId=' + id).then(result => result.json())
                .then((data) => {
                    console.log(data);
                    itemCount.value = data;
                })
                .catch(error => console.log(error));
        }

        function cartCount() {
            var cartAmount = document.getElementById("cartamount");
            cartAmount.innerHTML = "";
            fetch('/api/cart/cartCount').then(result => result.json())
                .then((data) => {
                    console.log(data);
                    cartAmount.innerHTML = data;
                })
                .catch(error => console.log(error));
        }

        function increaseItem(id) {
            fetch('/api/cart/increaseQuantity?ticketId=' + id, {
                method: 'GET'
            }).then(result => result.json())
                .then((data) => {
                    console.log(data);
                    loadCart();
                })
                .catch(error => console.log(error));
        }

        function decreaseItem(id) {
            fetch('/api/cart/decreaseQuantity?ticketId=' + id, {
                method: 'GET'
            }).then(result => result.json())
                .then((data) => {
                    console.log(data);
                    loadCart();
                })
                .catch(error => console.log(error));
        }

        function loadCart() {
            var items = document.getElementById("items");
            items.innerHTML = "";
            fetch('http://localhost/api/cart/getItemsInCart').then(result => result.json())
                .then((data) => {
                    console.log(data);
                    data.forEach(element => {
                        loadItems(element);
                        itemCount(element.id);
                    });
                    cartCount();
                })
                .catch(error => console.log(error));
        }

        function addToCalender() {
            fetch('http://localhost/api/cart/getItemsInCart').then(result => result.json())
                .then((data) => {
                    console.log(data);
                    data.forEach(element => {
                        loadCalender(element);
                    });

                })
                .catch(error => console.log(error));
        }

        function loadCalender(ticketInput) {
            date = ticketInput.event.date.split('-');
            startTime = ticketInput.event.start_time.split(':');
            endTime = ticketInput.event.end_time.split(':');
            var calendarEvent = document.getElementById(date[2] + "th");
            var pEvent = document.createElement("p");
            pEvent.className = "time";
            pEvent.innerHTML = ticketInput.title + "<br>" + startTime[0] + " " + endTime[0];
            var divEventExsit = document.getElementsByClassName("event start-" + startTime[0] + " end-" + endTime[0] + " " + ticketInput.event.event_type + "-event")[0];
            if (divEventExsit == null) {
                // divEventExsit.remove();
                var divEvent = document.createElement("div");
                divEvent.className = "event start-" + startTime[0] + " end-" + endTime[0] + " " + ticketInput.event.event_type + "-event";
                divEvent.appendChild(pEvent);
                calendarEvent.appendChild(divEvent);
            }


        }
    </script>