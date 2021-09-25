<?php
require_once('model/SQLiteConnection.php');
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
        $query = "Select * From ActivityData Order By id";
        $stmt = $dbc->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'ActivityData');
    }

    public final function insert($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Insert Into ActivityData(activity_id, time, cardio_frequency, latitude, longitude, altitude) Values (:activity_id, :time, :cardio_frequency, :latitude, :longitude, :altitude)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
//            $stmt->bindValue(':id', $st->getId(), PDO::PARAM_STR);
            $stmt->bindValue(':activity_id', $st->getActivityId(), PDO::PARAM_INT);
            $stmt->bindValue(':time', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':cardio_frequency', $st->getCardioFrequency(), PDO::PARAM_INT);
            $stmt->bindValue(':latitude', $st->getLatitude(), PDO::PARAM_INT);
            $stmt->bindValue(':longitude', $st->getLongitude(), PDO::PARAM_INT);
            $stmt->bindValue(':altitude', $st->getAltitude(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Delete From ActivityData Where id = :id";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':id', $st->getId(), PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function update($st) {
        if ($st instanceof ActivityData) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Update ActivityData Set id = :id , activity_id = :activity_id, time = :time, cardio_frequency = :cardio_frequency, latitude = :latitude, longitude = :longitude, altitude = :altitude";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id', $st->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':activity_id', $st->getActivityId(), PDO::PARAM_INT);
            $stmt->bindValue(':time', $st->getTime(), PDO::PARAM_STR);
            $stmt->bindValue(':cardio_frequency', $st->getCardioFrequency(), PDO::PARAM_INT);
            $stmt->bindValue(':latitude', $st->getLatitude(), PDO::PARAM_INT);
            $stmt->bindValue(':longitude', $st->getLongitude(), PDO::PARAM_INT);
            $stmt->bindValue(':altitude', $st->getAltitude(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>