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
        $user = $stmt->fetch(PDO::FETCH_CLASS, 'User');
        $user->init($email, $user->getPassword(), $_POST["lname"], $_POST["fname"], $_POST["bdate"],  $_POST["gender"], $_POST["height"], $_POST["weight"]);
        $UserDAO = UserDAO::getInstance();
        $UserDAO->update($user);




    }
}


$o = new ModifyUserController();
?>