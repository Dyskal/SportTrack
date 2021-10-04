<?php
require("Controller.php");
require_once("../model/UserDAO.php");
class AddUserController implements Controller {
    public function __construct() {
        $this->AddUser();
    }

    /**
     * Permet de s'inscrire sur le site
     */
    public function AddUser() {
        //Création de l'utilisateur dans la base de données
        $User = new User();
        $User->init(htmlspecialchars($_POST["mail"]), htmlspecialchars($_POST["password"]), htmlspecialchars($_POST["lname"]), htmlspecialchars($_POST["fname"]), htmlspecialchars($_POST["bdate"]), htmlspecialchars($_POST["gender"]), htmlspecialchars($_POST["height"]), htmlspecialchars($_POST["weight"]));
        $UserDAO = UserDAO::getInstance();
        $UserDAO->insert($User);
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
            window.location.href = '../?page=login&msg=Thank%20you%20for%20registering%20on%20our%20website.%20Please%20log%20in.&color=%2300fc0080';
        </script>
        <?php
    }

    public function handle($request) {}
}
$o = new AddUserController();
?>