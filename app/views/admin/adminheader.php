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
    <link rel="stylesheet" href="/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/components.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/homepage.css?v=<?php echo time(); ?>">

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

            <div class="logo">
                <img src="/img/logo-of-page.png" alt="Logo">
            </div>

            <div id="menu-list" class="menu-list">
                <a href="/editor" class="remove-style menu-list-option <? echo returnStyle("/order"); ?>">Homepage</a>
                <a href="/festival-page-edit" class="remove-style menu-list-option <? echo returnStyle("/order"); ?>">Festivalpage</a>
                <a href="/order" class="remove-style menu-list-option <? echo returnStyle("/order"); ?>">Orders</a>

                <select name="CRUD" id="CRUD" onchange="redirct(this.value)"
                    class="menu-list-option <? echo returnStyle("/user"); ?>">
                    <option <? echo returnSelected("/event"); ?> value="/event">Events</option>
                    <option <? echo returnSelected("/venue"); ?> value="/venue">Venues</option>
                    <option <? echo returnSelected("/artist"); ?> value="/artist">Artists</option>
                    <option <? echo returnSelected("/restaurant"); ?> value="/restaurant">Restaurants</option>
                    <option <? echo returnSelected("/session"); ?> value="/session">Sessions</option>
                    <option <? echo returnSelected("/reservation"); ?> value="/reservation">Reservations</option>
                    <option <? echo returnSelected("/user"); ?> value="/user">Users</option>
                </select>
            </div>
        </div>
    </nav>

    <script>
        window.load = cartCount;
        function redirct(src) {
            window.location = src;
        }
    </script>