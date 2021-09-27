<?php
require("Controller.php");
require_once("../model/UserDAO.php");
class ModifyUserController implements Controller {
    public function __construct() {
        $this->modify();
    }

    public function handle($request) {
        // TODO: Implement handle() method.
    }


    public function modify() {
        session_start();
        $email = $_SESSION['email'];
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * From User Where email='$email'";
        $stmt = $dbc->query($query);
        $user = $stmt->fetchAll(PDO::FETCH_CLASS, 'User')[0];
        $user->init($email, $user->getPassword(), $_POST["lname"], $_POST["fname"], $_POST["bdate"],  $_POST["gender"], $_POST["height"], $_POST["weight"]);


        $_SESSION["lname"] = $_POST["lname"];
        $_SESSION["fname"] = $_POST["fname"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["bdate"] = $_POST["bdate"];
        $_SESSION["height"] = $_POST["height"];
        $_SESSION["weight"] = $_POST["weight"];


        $UserDAO = UserDAO::getInstance();
        $UserDAO->update($user);
        ?>
        <script type="text/javascript">
            window.location.href = '../?page=profile';
        </script>
        <?php


    }
}


$o = new ModifyUserController();
?>