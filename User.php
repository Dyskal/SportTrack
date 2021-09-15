<?php
class User {
    private $lname;
    private $fname;
    private $password;
    private $email;
    private $bdate;
    private $gender;
    private $height;
    private $weight;

    public function  __construct() { }
    public function init($n,$p,$passwd,$email,$bdate,$gender,$height,$weight){
        $this->lname = $n;
        $this->fname = $p;
        $this->password = $passwd;
        $this->email = $email;
        $this->bdate = $bdate;
        $this->gender = $gender;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getLastname(){ return $this->lname; }
    public function getFirstname(){ return $this->fname; }
    public function getPassword(){ return $this->password; }
    public function getEmail(){ return $this->email; }
    public function getBirthDate(){ return $this->bdate; }
    public function getGender(){ return $this->gender; }
    public function getHeight(){ return $this->height; }
    public function getWeight(){ return $this->weight; }

    public function  __toString() { return $this->lname. " ". $this->fname. " ". $this->password. " ". $this->email. " ". $this->bdate. " ". $this->gender. " ". $this->height. " ". $this->weight; }
}
?>