<?php
require("Controller.php");
require_once("../model/UserDAO.php");
class ModifyUserController implements Controller {
    public function __construct() {
        $this->modify();
    }

    /**
     * Permet de modifier les infos d'un utilisateur
     */
    public function modify() {
        session_set_cookie_params(['lifetime' => 0, 'path' => '/m3104_24', 'domain' => '', 'secure' => false, 'httponly' => false, 'samesite' => '']);
        session_start();

        //Met à jour la table de l'utilisateur
        $email = $_SESSION['email'];
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * From User Where email = :email";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_CLASS, 'User')[0];
        $user->init($email, $user->getPassword(), htmlspecialchars($_POST["lname"]), htmlspecialchars($_POST["fname"]), htmlspecialchars($_POST["bdate"]), htmlspecialchars($_POST["gender"]), htmlspecialchars($_POST["height"]), htmlspecialchars($_POST["weight"]));
        //Mise à jour des variables de session
        $_SESSION["lname"] = htmlspecialchars($_POST["lname"]);
        $_SESSION["fname"] = htmlspecialchars($_POST["fname"]);
        $_SESSION["gender"] = htmlspecialchars($_POST["gender"]);
        $_SESSION["bdate"] = htmlspecialchars($_POST["bdate"]);
        $_SESSION["height"] = htmlspecialchars($_POST["height"]);
        $_SESSION["weight"] = htmlspecialchars($_POST["weight"]);

        $UserDAO = UserDAO::getInstance();
        $UserDAO->update($user);
        ?>
        <script type="text/javascript">
            window.location.href = '../?page=profile&msg=Changes%20have%20been%20saved.&color=%2300fc0080';
        </script>
        <?php
    }
    public function handle($request) {
    }
}
$o = new ModifyUserController();
?>