<?php
require("Controller.php");
class ListActivityController implements Controller {

    public function handle($request) {}


    public function loadActivity(){
        session_start();
        $email = $_SESSION["email"];
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * from Activity Where user_id = '$email'";
        $stmt = $dbc->query($query);
        $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
    }
}
?>