<?php 
 
 $conn = mysqli_connect('localhost', 'root', '', 'blog');
   
$user_id= $_SESSION['ui'];
     
 
if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error($conn));
  exit();
}


include '../classes/Db.php'; 
include "../classes/LikeDislike.php";   
$user_id= $_SESSION['ui'];
     
$obj= new LikeDislike();
   

if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
    case 'like':
         $sql="INSERT INTO likes (user_id, post_id, rating_action) 
             VALUES ($user_id, $post_id, 'like') 
             ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
    case 'dislike':
          $sql="INSERT INTO likes (user_id, post_id, rating_action) 
               VALUES ($user_id, $post_id, 'dislike') 
             ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
    case 'unlike':
        $sql="DELETE FROM likes WHERE user_id=$user_id AND post_id=$post_id";
        break;
    case 'undislike':
          $sql="DELETE FROM likes WHERE user_id=$user_id AND post_id=$post_id";
      break;
    default:
      break;
  }
 
  mysqli_query($conn, $sql);
  $result=$obj->getRating($post_id);
  return json_encode($result);
  exit(0);
}
 


 
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM likes WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM likes 
            WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
    'likes' => $likes[0],
    'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}
 


$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);  
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);