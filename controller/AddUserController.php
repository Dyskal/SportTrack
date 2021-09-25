<?php
require("../model/UserDAO.php");
require ("Controller.php");
class AddUserController implements Controller {
    public function __construct() {
        $this->AddUser();
    }
    public function handle($request) {}

    public function AddUser() {
        $User = new User();
        $User->init($_POST["mail"], $_POST["password"], $_POST["lname"], $_POST["fname"], $_POST["bdate"], $_POST["gender"], $_POST["height"], $_POST["weight"]);
        $UserDAO = UserDAO::getInstance();
        $UserDAO->insert($User);
        echo $_POST["gender"];
        ?>
        <head>
            <meta charset="UTF-8">
            <title>SportTrack | Accueil</title>
            <link href="../style/style.css" rel="stylesheet">
            <link href="../img/logo.svg" rel="icon"/>
        </head>
        <div class=loading-content><div class=loading1></div><div class=loading2></div><div class=loading3></div></div>
<!--        <script type="text/javascript">-->
<!--            window.location.href = '../?page=login&msg=Thank%20you%20for%20registering%20on%20our%20website.%20Please%20log%20in.';-->
<!--        </script>-->

        <?php
    }
}
$o = new AddUserController();