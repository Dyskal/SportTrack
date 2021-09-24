<!DOCTYPE html>
<html lang="en">
<?php


ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('controller/ApplicationController.php');

$controller = ApplicationController::getInstance()->getController($_REQUEST);
if ($controller != null) {
    include("controller/$controller.php");
    (new $controller())->handle($_REQUEST);
    $view = ApplicationController::getInstance()->getView($_REQUEST);
    if ($view != null) {
        include("view/$view.php");
    }
} else {
?>
<head>
    <meta charset="UTF-8">
    <title>SportTrack | Accueil</title>
    <link href="./style/style.css" rel="stylesheet">
    <link href="./img/logo.svg" rel="icon"/>
</head>

<body>
<video preload="auto" autoplay loop id="myVideo">
    <source src="./img/video.mp4" type="video/mp4">
</video>
<?php
session_start();
if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];
    ?>
    <header>
        <h1 onclick="window.location.href='./'">SportTrack</h1>
        <nav>
            <button onclick="window.location.href='?page=upload'" class="header-btn header-upload"></button>
            <button onclick="window.location.href='?page=profile'" class="header-btn header-account"></button>
            <form action="./controller/DisconnectUserController.php" method="get">
            <button class="header-btn header-logout"></button></form>

        </nav>
    </header>

    <?php
} else {
    ?>
    <header>
        <h1 onclick="window.location.href='./'">SportTrack</h1>
        <nav>
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
</body>
</html>