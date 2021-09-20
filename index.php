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
    <header>
        <h1 onclick="window.location.href='./'">SportTrack</h1>
    </header>
    <div class=accueil>
        <button class=button onclick="window.location.href='?page=profile'">Profile</button>
        <button class=button onclick="window.location.href='?page=login'">Login</button>
        <button class=button onclick="window.location.href='?page=register'">Register</button>
        <button class=button onclick="window.location.href='?page=upload'">Upload</button>
    </div>
<?php
}


?>
</body>

</html>