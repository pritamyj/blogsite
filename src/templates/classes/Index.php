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

    $sql = "SELECT * from user WHERE user_id = $uid"; 
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 

public function dispcomment(){
    $sql = "SELECT * from comments"; 
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ; 
  } 
  
public function dispcommentuser($user_id){
     $sql = "SELECT * from user WHERE user_id = $user_id LIMIT 1"; 
    $stmt = $this->connect()->query($sql);
   $row = $stmt->fetch();
      return $row ;
  } 
  
public function viewcmtreplies($cmt_id){
     $sql = "SELECT * from comment_replies WHERE comment_id = $cmt_id ORDER BY commented_on DESC"; 
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
      $data[] = $row; 
    }
    return $data ;
  }
}





