<?php
require_once('SQLiteConnection.php');
include("User.php");
class UserDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if (!isset(self::$dao)) {
            self::$dao = new UserDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select * From User Order By lname, fname";
        $stmt = $dbc->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public final function verifyPassword($email, $password) {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "Select password from User Where email = '$email'";
        echo($query);
        $stmt = $dbc->query($query);
        $row = $stmt->fetch();
        if ($row['password'] == $password) {
            return true;
        }
        return false;
    }

    public final function insert($st) {
        if ($st instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Insert Into User(email, password, lname, fname, bdate, gender, height, weight) Values (:email, :password, :lname, :fname, :bdate, :gender, :height, :weight)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':email', $st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $st->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':lname', $st->getLastname(), PDO::PARAM_STR);
            $stmt->bindValue(':fname', $st->getFirstname(), PDO::PARAM_STR);
            $stmt->bindValue(':bdate', $st->getBirthDate(), PDO::PARAM_STR);
            $stmt->bindValue(':gender', $st->getGender(), PDO::PARAM_STR);
            $stmt->bindValue(':height', $st->getHeight(), PDO::PARAM_STR);
            $stmt->bindValue(':weight', $st->getWeight(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st) {
        if ($st instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Delete From User Where email = :email";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':email', $st->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    public function update($st) {
        if ($st instanceof User) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "Update User Set email = :email , password = :password, lname = :lname, fname = :fname, bdate = :bdate, gender = :gender, height = :height, weight = :weight Where email =:email";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':email', $st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $st->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':lname', $st->getLastname(), PDO::PARAM_STR);
            $stmt->bindValue(':fname', $st->getFirstname(), PDO::PARAM_STR);
            $stmt->bindValue(':bdate', $st->getBirthDate(), PDO::PARAM_STR);
            $stmt->bindValue(':gender', $st->getGender(), PDO::PARAM_STR);
            $stmt->bindValue(':height', $st->getHeight(), PDO::PARAM_STR);
            $stmt->bindValue(':weight', $st->getWeight(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>