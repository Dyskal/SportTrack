<?php
 class Student{
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

   public function getLastname(){ return $this->nom; }
   public function getFirstname(){ return $this->prenom; }
   public function getPassword(){ return $this->password; }
   public function getEmail(){ return $this->email; }
   public function getBirthDate(){ return $this->bdate; }
   public function getPassword(){ return $this->password; }
   public function getPassword(){ return $this->password; }
   public function getPassword(){ return $this->password; }

   public function  __toString() { return $this->nom. " ". $this->prenom; }
  }
?>