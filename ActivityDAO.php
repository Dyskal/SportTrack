<?php
require_once('model/SqliteConnection.php');
include("Activity.php");
class ActivityDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new ActivityDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * From Activity Order By lname,fname";
        $stmt = $dbc->query($query);
        return $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
    }

    public final function insert($st){
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Insert Into Activity(id, user_id, date, description, start_time, duration, freq_min, freq_max, freq_avg) Values (:id, :Activity_id, :date, :description, :start_time, :duration, :freq_min, :freq_max, :freq_avg)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':user_id',$st->getUserId(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':description',$st->getDescription(),PDO::PARAM_STR);
            $stmt->bindValue(':start_time',$st->getStartTime(),PDO::PARAM_STR);
            $stmt->bindValue(':duration',$st->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_min',$st->getFreqmin(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_max',$st->getFreqmax(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_avg',$st->getFreqavg(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st){
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Delete From Activity Where id = :id";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    public function update($st){
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Update Activity Set id = :id , user_id = :user_id, date = :date, description = :description, start_time = :start_time, duration = :duration, freq_min = :freq_min, freq_max = :freq_max , freq_avg = :freq_avg Where id =:id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$st->getId(),PDO::PARAM_STR);
            $stmt->bindValue(':user_id',$st->getUserId(),PDO::PARAM_STR);
            $stmt->bindValue(':date',$st->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':description',$st->getDescription(),PDO::PARAM_STR);
            $stmt->bindValue(':start_time',$st->getStartTime(),PDO::PARAM_STR);
            $stmt->bindValue(':duration',$st->getDuration(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_min',$st->getFreqmin(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_max',$st->getFreqmax(),PDO::PARAM_STR);
            $stmt->bindValue(':freq_avg',$st->getFreqavg(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>