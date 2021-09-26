<?php
require("Controller.php");
require_once("../model/UserDAO.php");
class ConnectUserController implements Controller {
    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $UserDAO = UserDAO::getInstance();
        $passwordCheck = $UserDAO->verifyPassword($_POST["email"], $_POST["password"]);
        if ($passwordCheck) {
            session_start();
            $_SESSION["email"] = $_POST["email"];
            ?>
            <head>
                <meta charset="UTF-8">
                <title>SportTrack | Accueil</title>
                <link href="../style/style.css" rel="stylesheet">
                <link href="../img/logo.svg" rel="icon"/>
            </head>
            <div class=loading-content>
                <div class=loading1></div>
                <div class=loading2></div>
                <div class=loading3></div>
            </div>
            <script type="text/javascript">
                window.location.href = '..';
            </script>
            <?php
        } else {
            ?>
            <head>
                <meta charset="UTF-8">
                <title>SportTrack | Accueil</title>
                <link href="../style/style.css" rel="stylesheet">
                <link href="../img/logo.svg" rel="icon"/>
            </head>
            <div class=loading-content>
                <div class=loading1></div>
                <div class=loading2></div>
                <div class=loading3></div>
            </div>
            <script type="text/javascript">
                window.location.href = '../?page=login&msg=Wrong%20password%20or%20email,%20please try again.';
            </script>
            <?php
        }
    }

    public function handle($request) {}
}
$o = new ConnectUserController();
?>