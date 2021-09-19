<?php
 
include '../classes/Db.php';  
include '../classes/Comments.php';

	$obj= new Comments();

if(isset($_POST['add_subreplies'])){ 
	$cmt_id =$_POST['cmt_id'];
	$reply=$_POST['reply_msg'];
	$userid=$_SESSION['ui'];

	$data=$obj->commentreplies($userid, $cmt_id, $reply);
	
	header('Content-type: application/json');
	echo json_encode($data);
}


if(isset($_POST['view_comment_data'])){
	$cmt_id =$_POST['cmt_id']; 
	$data=$obj->viewcmtreplies($cmt_id);
	$result_array= [];
	foreach($data as $q){
		$user_id = $q['user_id']; 
	    $dataa=$obj->dispcommentuser($user_id);

	    array_push($result_array,['cmt'=>$q, 'userr'=>$dataa]);
	}
	header('Content-type: application/json');
	echo json_encode($result_array);
}


if(isset($_POST['add_reply'])){ 
	$cmt_id =$_POST['comment_id'];
	$reply=$_POST['reply_msg'];
	$userid=$_SESSION['ui'];
 
	$data=$obj->commentreplies($userid, $cmt_id, $reply);
	
	header('Content-type: application/json');
	echo json_encode($data);
}


if(isset($_POST['comment_load_data'])){  
	$post_id=$_POST['post_id'];
	$data=$obj->dispcomment($post_id);
	$array_result= [];
	foreach($data as $q){
		$user_id = $q['user_id']; 
	    $dataa=$obj->dispcommentuser($user_id);

	    array_push($array_result,['cmt'=>$q, 'userr'=>$dataa]);
	}
	header('Content-type: application/json');
	echo json_encode($array_result);
}


if(isset($_POST['add_comment']))
{
	$post_id=$_POST['post_id'];
	$msg = $_POST['msg'];
	$user_id=$_SESSION['ui']; 
	$result=$obj->comment($user_id,$msg, $post_id);

	header('Content-type: application/json');
	echo json_encode($result);
}