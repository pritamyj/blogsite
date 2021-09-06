<?php

 
class Index extends Db{
 
  public function allposts(){

    $sql = "SELECT * FROM data ORDER BY date DESC";
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 


  public function usern($uid){

    $sql = "SELECT * from user WHERE user_id = '$uid'"; 
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 

}


class User extends Db{
 
  public function userposts($ui){

    $sql = "SELECT * FROM data WHERE user_id=$ui"; 
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 

  public function selectedpostuser($id, $ui){

    $sql = "SELECT * FROM data WHERE id = $id AND user_id=$ui"; 
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 
  
   public function selectedposts($id){

    $sql = "SELECT * FROM data WHERE id = $id"; 
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
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

public function upd_mydetails($uname, $pass, $name, $uid){
    $sql = "UPDATE user SET username=?, password=?, full_name=? WHERE user_id=?"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uname, $pass, $name, $uid]); 
  } 

public function deleteuser($uid){

    $sql = "DELETE FROM data WHERE user_id=?"; 
    $sql2 = "DELETE FROM user WHERE user_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);
    $stmt2 = $this->connect()->prepare($sql2);
    $stmt2->execute([$uid]); 
  }   
  
public function Adduser($uname, $pass, $name, $user){

    $sql = "INSERT INTO user(username, password, full_name, user_type) VALUES(?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uname, $pass, $name, $user]); 
     return true; 

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

$sql = "INSERT INTO user(username, password, full_name, user_type) VALUES(?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uname, $pass, $name, $user]); 
     
    return true; 

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

 
