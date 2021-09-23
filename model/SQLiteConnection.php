<?php
class SQLiteConnection {
    private static $instance;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new SQLiteConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        try {
            $conn = new PDO("sqlite:" . dirname(__FILE__) . "/../sql/sport_track.db");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage() . "<br/>");
            die();
        }
    }
}













