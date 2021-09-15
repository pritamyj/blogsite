<?php

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

public function showalluser(){

    $sql = "SELECT * FROM user";
    $stmt = $this->connect()->query($sql); 
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 

  public function comment($user_id, $msg){
    $sql = "INSERT INTO comments(user_id, msg) VALUES(?, ?)"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $msg]); 
    return true; 
  }
  
public function commentreplies($userid, $cmt_id, $reply){
      $sql = "INSERT INTO comment_replies(user_id, comment_id, reply_msg) VALUES(?, ?, ?)"; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userid, $cmt_id, $reply]); 
    return true; 
  } 
  
}
