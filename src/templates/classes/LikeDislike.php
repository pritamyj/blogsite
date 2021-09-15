<?php


class LikeDislike extends Db{
  private $user_id="";
  public function like(){

    $sql="INSERT INTO likes (user_id, post_id, rating_action) 
    VALUES ($user_id, $post_id, 'like') 
    ON DUPLICATE KEY UPDATE rating_action='like'";
    $stmt = $this->connect()->query($sql); 
  }

  public function dislike(){

    $sql="INSERT INTO dislikes (user_id, post_id, rating_action) 
    VALUES ($user_id, $post_id, 'dislike') 
    ON DUPLICATE KEY UPDATE rating_action='dislike'";
    $stmt = $this->connect()->query($sql); 
  }

  public function unlike(){

    $sql="DELETE FROM unlikes WHERE user_id=$user_id AND post_id=$post_id";
    $stmt = $this->connect()->query($sql); 
  }

  public function undislike(){

    $sql="DELETE FROM undislikes WHERE user_id=$user_id AND post_id=$post_id";
    $stmt = $this->connect()->query($sql); 
  }

public function getRating($id){

  $rating = array();

  $likes_query = "SELECT COUNT(*) FROM likes WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM likes WHERE post_id = $id AND rating_action='dislike'";

  $likes_rs = $this->connect()->query($likes_query);
  $dislikes_rs = $this->connect()->query($dislikes_query);

  $likes = $likes_rs->fetch();
  $dislikes = $dislikes_rs->fetch();

  $rating = [
    'likes' => $likes,
    'dislikes' => $dislikes
  ];
  return json_encode($rating);
}
 
public function getLikes($id){

  $sql = "SELECT COUNT(*) FROM likes 
        WHERE post_id = $id AND rating_action='like'";
  $rs = $this->connect()->query($sql);
  $result = $rs->fetch();
  return $result;
}
 
public function getDislikes($id)
{
  $sql = "SELECT COUNT(*) FROM likes WHERE post_id = $id AND rating_action='dislike'";
  $rs = $this->connect()->query($sql);  
  $result = $rs->fetch();
  return $result;
}
 

 
public function userLiked($post_id, $user_id)
{
  $this->user_id = $user_id;
  $sql = "SELECT * FROM likes WHERE user_id=$user_id AND post_id=$post_id AND rating_action='like'";
  $result = $this->connect()->query($sql);
  if ($row=$result->fetch() > 0) {
    return true;
  }else{
    return false;
  }
}
 
public function userDisliked($post_id, $user_id)
{
  $this->user_id = $user_id;
  $sql = "SELECT * FROM likes WHERE user_id=$user_id AND post_id=$post_id AND rating_action='dislike'";
  $result = $this->connect()->query($sql);
  if ($row=$result->fetch() > 0) {
    return true;
  }else{
    return false;
  }
}

}