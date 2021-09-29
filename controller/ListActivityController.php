<?php
require("Controller.php");
require_once("./model/SQLiteConnection.php");
require("./model/Activity.php");
class ListActivityController implements Controller {
    public function __construct() {
        $this->loadActivity();
    }

    public function loadActivity(){

        session_start();

        $email = $_SESSION["email"];
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * from Activity Where user_id = :email";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');

        $table = '';
        foreach($res as $act) {
            $table .= '<div class="activity-table">';
            $table .= '<table>';
            $table .= '<tr><th>Description</th><th>Date</th><th>Start Time</th><th>Duration</th><th>Distance</th><th>Freq Min</th><th>Freq Max</th><th>Freq Avg</th></tr>';
            $table .= '<tr><td>'.$act->getDescription().'</td><td>'.$act->getDate().'</td><td>'.$act->getStartTime().'</td><td>'.$act->getDuration().'</td><td>'.$act->getDistance().'</td><td>'.$act->getFreqMin().'</td><td>'.$act->getFreqMax().'</td><td>'.$act->getFreqAvg().'</td></tr>';
            $table .= '</table>';
            $table .= '</div>';
        }
        $_SESSION['table'] = $table;
    }

    public function handle($request) {}
}
$o = new ListActivityController();
?>
