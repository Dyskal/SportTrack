<?php
require("Controller.php");
require_once("./model/SQLiteConnection.php");
require("./model/Activity.php");
class ListActivityController implements Controller {
//Ce tableau devra faire apparaître la description, la date, l’heure de début et la durée de chaque activité,
//ainsi que la distance parcourue lors de celle-ci et les fréquences cardiaques minimum, maximum et moyenne.

    public function loadActivity(){
        session_start();
        $email = $_SESSION["email"];
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * from Activity Where user_id = '$email'";
        $stmt = $dbc->query($query);
        $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
//        var_dump($res);
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
        echo($table);
    }

    public function handle($request) {}
}
$o = new ListActivityController();
$o->loadActivity();
?>
