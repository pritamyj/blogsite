<?php


class Login extends Db{
 
  public function login_check($uname, $pass){

$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data; 

 } 

}

