<?php
require_once('model/SqliteConnection.php');
include("User.php");

class UserDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
       if(!isset(self::$dao)) {
           self::$dao= new UserDAO();
       }
       return self::$dao;
    }

    public final function findAll(){
       $dbc = SqliteConnection::getInstance()->getConnection();
       $query = "select * from user order by lname,fname";
       $stmt = $dbc->query($query);
       $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
       return $results;
    }

   public final function insert($st){
      if($st instanceof User){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "insert into User(email, password, lname, fname, bdate, gender, height, weight) values (:email, :password, lname, :fname, :bdate, :gender, :height, :weight)";
         $stmt = $dbc->prepare($query);

         // bind the paramaters
         $stmt->bindValue(':email',$st->getEmail(),PDO::PARAM_STR);
         $stmt->bindValue(':password',$st->getPassword(),PDO::PARAM_STR);
         $stmt->bindValue(':lname',$st->getLastname(),PDO::PARAM_STR);
         $stmt->bindValue(':fname',$st->getFirstname(),PDO::PARAM_STR);
         $stmt->bindValue(':bdate',$st->getBirtDate(),PDO::PARAM_STR);
         $stmt->bindValue(':gender',$st->getGender(),PDO::PARAM_STR);
         $stmt->bindValue(':height',$st->getHeight(),PDO::PARAM_STR);
         $stmt->bindValue(':weight',$st->getWeight(),PDO::PARAM_STR);

         // execute the prepared statement
         $stmt->execute();
     }
  }

  public function delete($st){ 
     if($st instanceof User){
         $dbc = SqliteConnection::getInstance()->getConnection();
         // prepare the SQL statement
         $query = "delete from User where email = :email";
         $stmt = $dbc->prepare($query);
         $stmt->bindValue(':email',$st->getEmail(),PDO::PARAM_STR);
         $stmt->execute();
      }
  }

  //public function update($obj){...}
}
?>