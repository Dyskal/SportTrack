<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require('controller/ApplicationController.php');

$controller = ApplicationController::getInstance()->getController($_REQUEST);
if ($controller != null) {
    include("controller/$controller.php");
    (new $controller())->handle($_REQUEST);
}

$view = ApplicationController::getInstance()->getView($_REQUEST);
if ($view != null) {
    include("view/$view.php");
}

?>
