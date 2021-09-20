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

}





