<?php
require("Controller.php");
require("../model/Activity.php");
class UploadActivityController implements Controller {
    public function __construct() {
        $this->UploadFile();
    }

    public function UploadFile() {
        var_dump($_FILES['file']['tmp_name']);
        echo('<br>');
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        $json = (fread($file, filesize($_FILES['file']['tmp_name'])));
        fclose($file);
        $jsond = json_decode($json, true);
        var_dump($jsond);
        $activity = new Activity();
        $activity->init(null, $_SESSION['email'], $jsond['activity']['date'], $jsond['activity']['description'], null, null, null, null, null);
    }

    public function handle($request) {}
}

$o = new UploadActivityController();
?>