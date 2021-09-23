<?php
require("../model/UserDAO.php");
require("Controller.php");

class ConnectUserController implements Controller {

    public function handle($request) {
        // TODO: Implement handle() method.
    }

    public function connect() {
        session_start();
        $_SESSION["email"] = "test";
    }
}