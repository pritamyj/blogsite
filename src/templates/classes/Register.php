<?php

class Register extends Db{
 
  public function signup_check($uname, $pass, $name, $user){

$sql = "INSERT INTO user(username, password, full_name, user_type) VALUES(?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uname, $pass, $name, $user]); 
     
    return true; 

 } 

public function usern_check($uname ){

$sql = "SELECT * FROM user WHERE username='$uname' ";
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data; 

 } 

}

 