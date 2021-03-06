<?php
require_once('SQLiteConnection.php');
include("ActivityData.php");
class ActivityDataDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance(): ActivityDataDAO {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityDataDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * From ActivityData Order By data_id";
        $stmt = $dbc->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ActivityData');
    }

    public final function getNextId() {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select MAX(data_id) From ActivityData";
        $stmt = $dbc->query($query);
        return $stmt->fetch()[0] + 1;
    }

    public final function insert($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Insert Into ActivityData(data_id, activity_id, time, cardio_frequency, latitude, longitude, altitude) Values (:data_id, :activity_id, :time, :cardio_frequency, :latitude, :longitude, :altitude)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':data_id', $st->getDataId(), PDO::PARAM_STR);
            $stmt->bindValue(':activity_id', $st->getActivityId(), PDO::PARAM_STR);
            $stmt->bindValue(':time', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':cardio_frequency', $st->getCardioFrequency(), PDO::PARAM_STR);
            $stmt->bindValue(':latitude', $st->getLatitude(), PDO::PARAM_STR);
            $stmt->bindValue(':longitude', $st->getLongitude(), PDO::PARAM_STR);
            $stmt->bindValue(':altitude', $st->getAltitude(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Delete From ActivityData Where data_id = :data_id";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':data_id', $st->getDataId(), PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    public function update($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Update ActivityData Set data_id = :data_id , activity_id = :activity_id, time = :time, cardio_frequency = :cardio_frequency, latitude = :latitude, longitude = :longitude, altitude = :altitude";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':data_id', $st->getDataId(), PDO::PARAM_STR);
            $stmt->bindValue(':activity_id', $st->getActivityId(), PDO::PARAM_STR);
            $stmt->bindValue(':time', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':cardio_frequency', $st->getCardioFrequency(), PDO::PARAM_STR);
            $stmt->bindValue(':latitude', $st->getLatitude(), PDO::PARAM_STR);
            $stmt->bindValue(':longitude', $st->getLongitude(), PDO::PARAM_STR);
            $stmt->bindValue(':altitude', $st->getAltitude(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>