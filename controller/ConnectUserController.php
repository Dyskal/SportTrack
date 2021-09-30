<?php
require("Controller.php");
require_once("../model/UserDAO.php");
class ConnectUserController implements Controller {
    public function __construct() {
        $this->connect();
    }

    /**
     * Connecte l'utilisateur au site web
     */
    public function connect() {
        $UserDAO = UserDAO::getInstance();
        $passwordCheck = $UserDAO->verifyPassword(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));


//verifie que les identifiants de l'utilisateur sont bon
        if ($passwordCheck) {
            session_start();
            $_SESSION["email"] = htmlspecialchars($_POST["email"]);
            $email = $_SESSION['email'];
            //          on recupere les infos de l'utilisateur grâce à son email
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "Select * From User Where email = :email";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetchAll(PDO::FETCH_CLASS, 'User')[0];
//            On recupere les infos de l'utilisateur dans la session pour pouvoir les afficher sur la page de modification de profil
            $_SESSION['gender'] = $user->getGender();
            $_SESSION['lname'] = $user->getLastName();
            $_SESSION['fname'] = $user->getFirstName();
            $_SESSION['fname'] = $user->getFirstName();
            $_SESSION['bdate'] = $user->getBirthDate();
            $_SESSION['height'] = $user->getHeight();
            $_SESSION['weight'] = $user->getWeight();



            ?>


<!--                  Lancement d'un petit menu de chargement-->
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


<!--            redirection vers la page d'accueil-->
            <script type="text/javascript">
                window.location.href = '..';
            </script>
            <?php
        } else {
            ?>
            <!--                  Lancement d'un petit menu de chargement-->

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
            <!--            redirection vers la page login avec une erreur passé en parametre de l'url-->

            <script type="text/javascript">
                window.location.href = '../?page=login&msg=Wrong%20password%20or%20email,%20please%20try%20again.';
            </script>
            <?php
        }
    }

    public function handle($request) {}
}
$o = new ConnectUserController();
?>