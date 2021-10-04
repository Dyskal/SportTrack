<?php
require("Controller.php");
require("../model/CalculDistanceImpl.php");
require_once("../model/ActivityDAO.php");
require_once("../model/ActivityDataDAO.php");
class UploadActivityController implements Controller {
    public function __construct() {
        $this->UploadFile();
    }

    /**
     * Permet d'upload des fichiers json contenant les infos des activités
     */
    public function UploadFile() {
        session_set_cookie_params(['lifetime' => 0, 'path' => '/m3104_24', 'domain' => '', 'secure' => false, 'httponly' => false, 'samesite' => '']);
        session_start();

        //Parse le fichier JSON
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        $json = (fread($file, filesize($_FILES['file']['tmp_name'])));
        fclose($file);
        $jsond = json_decode($json, true);

        //Crée une activité avec les données du fichier
        $activity = new Activity();
        $ActivityDAO = ActivityDAO::getInstance();
        $activity_id = $ActivityDAO->getNextId();
        if (!array_key_exists('activity', $jsond) || !array_key_exists('date', $jsond['activity']) || !array_key_exists('description', $jsond['activity'])) {
            $this->exit();
        } else {
            $activity->init($activity_id, $_SESSION['email'], date('Y-m-d', strtotime($jsond['activity']['date'])), $jsond['activity']['description'], null, null, null, null, null, null);
            $ActivityDAO->delete($activity);
            $ActivityDAO->insert($activity);
        }

        //Lie les data à l'activité
        $ActivityDataDAO = ActivityDataDAO::getInstance();
        if (!array_key_exists('data', $jsond)) {
            $this->exit();
        } else {
            foreach ($jsond['data'] as $line) {
                if (!array_key_exists('time', $line) || !array_key_exists('cardio_frequency', $line) || !array_key_exists('latitude', $line) || !array_key_exists('longitude', $line) || !array_key_exists('altitude', $line)) {
                    break;
                }
                $data = new ActivityData();
                $data_id = $ActivityDataDAO->getNextId();
                $data->init($data_id, $activity_id, $line['time'], $line['cardio_frequency'], $line['latitude'], $line['longitude'], $line['altitude']);
                $ActivityDataDAO->insert($data);
            }
        }

        //Calcule la distance totale
        $distance = new CalculDistanceImpl();
        $activity_array = $ActivityDAO->find($activity_id);
        $activity = $activity_array[0];
        $activity->setDistance($distance->calculDistanceTrajet($distance->json_cut(json_encode($jsond['data']))));
        $ActivityDAO->update($activity);
        ?>

        <!--Lancement d'un petit menu de chargement-->
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

        <!--Redirection vers la page home-->
        <script type="text/javascript">
            window.location.href = '..';
        </script>
        <?php
    }

    public function handle($request) {}

    public function exit() {
        ?>
        <script type="text/javascript">
            window.location.href = '../?page=home&msg=Activity%20cannot%20be%20imported.%20JSON%20file%20must%20be%20errored.';
        </script>
        <?php
    }
}
$o = new UploadActivityController();
?>