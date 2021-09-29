<!DOCTYPE html>
<html lang="en">
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('controller/ApplicationController.php');


if (isset($_REQUEST["page"])) {
    $controller = ApplicationController::getInstance()->getController($_REQUEST);

    if ($controller != null) {
        require("controller/$controller.php");
        (new $controller())->handle($_REQUEST);
        $view = ApplicationController::getInstance()->getView($_REQUEST);
        if ($view != null) {
            require("view/$view.php");
        }
    }
} else {
?>
<head>
    <meta name="viewport" content="width=device-width, maximum-scale=1.5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>SportTrack | Accueil</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body>
<video preload="auto" playsinline autoplay muted loop id="myVideo">
    <source src="./img/video.mp4" type="video/mp4">
</video>

<?php
session_start();
if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];
    ?>
    <script type="text/javascript">
        window.location.href = './?page=home';
    </script>

    <?php
} else {
    ?>
    <header>
        <h1 onclick="window.location.href='./'">SportTrack</h1>
        <button onclick="burgerMenu()" id="header-burger" class="header-btn header-burger"></button>
        <nav id="menu">
            <button onclick="window.location.href='./'" class="header-btn header-home"></button>
            <button onclick="window.location.href='?page=register'" class="header-btn header-login">Register</button>
            <button onclick="window.location.href='?page=login'" class="header-btn header-login">Login</button>
        </nav>
    </header>
    <?php
}
?>

<div class=accueil>
    <!--    <button class=button onclick="window.location.href='?page=profile'">Profile</button>-->
    <!--    <button class=button onclick="window.location.href='?page=login'">Login</button>-->
    <!--    <button class=button onclick="window.location.href='?page=register'">Register</button>-->
    <!--    <button class=button onclick="window.location.href='?page=upload'">Upload</button>-->
</div>
<?php
}
?>
<script>
    function burgerMenu() {
        let nav = document.getElementById("menu");
        nav.classList.toggle("toggle");
        document.getElementById("header-burger").classList.toggle("toggle");
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;


        document.body.classList.toggle("toggle");
    }
</script>
</body>
</html>