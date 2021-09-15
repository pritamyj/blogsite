<?php 
 
   
$user_id= $_SESSION['ui'];
     
$obj= new LikeDislike();
 
if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  
  switch ($action) {
  	case 'like':
          $obj->like();
         break;
  	case 'dislike':
          $obj->dislike();
         break;
  	case 'unlike':
          $obj->unlike();
	      break;
  	case 'undislike':
          $obj->undislike();
      break;
  	default:
  		break;
  }
  
  $obj->getRating($post_id);
  echo $obj;
  exit(0);
}

$ob= new Index();   
$posts = $ob->allposts();