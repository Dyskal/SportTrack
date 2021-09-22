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

    }

}
var_dump($_POST);
$o = new AddUserController();