<?php

class User extends Db{
 

//   public function __constructor(){

// }


  public function allposts(){

    $sql = "SELECT * FROM data  ORDER BY date DESC";
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 


  public function author($uid){

    $sql = "SELECT * from user WHERE user_id = '$uid'"; 
    $stmt = $this->connect()->query($sql);
    $row = $stmt->fetch();
    $data = $row['username'];
    return $data; 
  } 
  

public function insert($title, $content, $uid, $desc, $filedest){

    $sql = "INSERT INTO data(title, content, user_id, short_desc, images) VALUES(?, ?, ?, ?, ?)"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $content, $uid, $desc, $filedest]); 
  } 


public function update($title, $content, $desc, $filedest, $uid){

    $sql = "UPDATE data SET title=?, content=?, short_desc=?, images=? WHERE id=?"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $content, $desc, $filedest, $uid]); 
  } 

public function delete($id){

    $sql = "DELETE FROM data WHERE id=?"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]); 
  } 

}




class Login extends Db{
 
  public function login_check($uname, $pass){

$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
    $stmt = $this->connect()->query($sql);
    // $stmt->execute([$uname, $pass]); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data; 

 } 

}




class Register extends Db{
 
  public function signup_check($uname, $pass, $name, $user){

$sql = "INSERT INTO user(username, password, full_name, user_type) VALUES($uname, $pass, $name, $user)";
    $stmt = $this->connect()->query($sql);
    // $stmt->execute([$uname, $pass]); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data; 

 } 

public function usern_check($uname ){

$sql = "SELECT * FROM user WHERE username='$uname' ";
    $stmt = $this->connect()->query($sql);
    // $stmt->execute([$uname, $pass]); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data; 

 } 

}