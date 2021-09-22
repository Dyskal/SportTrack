<?php


require("../model/UserDAO.php");
require ("Controller.php");

class AddUserController implements Controller {
    public function __construct() {

        $this->AddUser();
    }

    public function handle($request) {
        // TODO: Implement handle() method.
    }

    public function AddUser() {
        $User = new User();
        $User->init($_POST["mail"], $_POST["password"], $_POST["lname"], $_POST["fname"], $_POST["date"], $_POST["sex"], $_POST["height"], $_POST["weight"]);
        $UserDAO = UserDAO::getInstance();
        $UserDAO->insert($User);
        ?>
        <script type="text/javascript">
            window.location.href = '..';
        </script>
        <head>
            <meta charset="UTF-8">
            <title>SportTrack | Accueil</title>
            <link href="../style/style.css" rel="stylesheet">
            <link href="../img/logo.svg" rel="icon"/>
        </head>
        <div class=loading-content><div class=loading1></div><div class=loading2></div><div class=loading3></div></div>
        <?php
    }

}
$o = new AddUserController();