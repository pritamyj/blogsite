<?php 
 $errorlevel = error_reporting();
 error_reporting($errorlevel & ~E_NOTICE);
 session_start();
 include '../autoload.php';
 include "server.php";


  
 if (isset($_REQUEST['delete'])) {
 	$id = $_REQUEST['id'];

 	$delete = new User();
 	$delete->delete($id);

 	if ($_SESSION['ty'] == 'admin') {

 		header("Location: ../Admin/admin.php?info=deleted");
 		exit();
 	} else {
 		header("Location: ../User/user.php?info=deleted");
 		exit();
 	}
 }

 ?>

 <!DOCTYPE html>
<html>
	<head>
 	<meta charset="UTF-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="../../css/indexadmin.css"> 
		<title></title>
		<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
		<style type="text/css">
		*{
		margin: 0; padding:0; box-sizing: border-box;
		font-family: 'Mulish', sans-serif;}
		.grand_parent{ width: 100vw; height:100vh;
			background: #dfe6e9; color: #fff;}
		h1{
			font-size: 4rem;
			padding: 20px 0;
			text-align: center;
			color: #000;
		}
		p{
			text-align: center;
		}
		.parents{ width: 80vw; height: auto; margin: auto;
			display: flex;  justify-content: space-around;
			flex-wrap: wrap; transition: all 0.2 linear;
		} 
		.child:first-child{
			height: 200px;
			background: #ffbe76;
			width: 65%; 
			margin: 20px;
		} 
		.child:last-child{
			height: 200px; 
			background: #ff7979;
			margin: 20px;
			width: 100%; 
		}
		@media (max-width: 768px){
			.grand_parent{height:auto; }
		}
		</style>
	</head>
	<body>
 	<?php
  if($_SESSION['ty'] == false){  
    include "../Header/navbar.php";   
  }elseif($_SESSION['ty'] == 'admin'){ 
    include "../Header/navbar_admin.php";  
  }elseif($_SESSION['ty'] == 'user'){ 
    include "../Header/navbar_user.php";  } 
    $id = $_REQUEST['id'];
    $ui= $_SESSION['ui']; 

 ?> 
		<div class="grand_parent">
			<h1> Services </h1>
			<div class="parents">
				<div class="child"><?php
    $data = new User(); 
    if($_SESSION['ty'] == 'admin' || $_SESSION['ty'] == false)
    {
      
      $queryy = $data->selectedposts($id);
      
      foreach ($queryy as $q) { 
$pid=$q['id'];  
        ?> 




 <div class="post_content">
                <div class="post-image">
                  <div>
                    <img src="../../<?php echo $q['images']; ?>" alt="blog1" class="img">
                  </div>
                  
                  <?php 
                  $ob= new LikeDislike(); 
                  $a2= new Index(); 
                  $a1 = $a2->usern($q['user_id']); 
                  foreach($a1 as $u){
                    $uname= $u['username'] ;
                  }
                  ?>
                  
                  <div class="post_title"> 
                    <h2><strong><?php echo $q['title'] ?></strong></h2>  
                  </div>
                  <div class="post_content">
                    <p><?php echo $q['content'] ?></p>
                    <h4><span>Author: <?php echo $uname; ?></span>
                      <span style="float: right;"> Posted on: <?php echo $q['date'] ?></span></h4>
                    </div>
                  </div>

                  <?php if ($_SESSION['ty'] == 'admin') {
                    include "view_likes.php"; 
                  }else{ ?>
                    <div class="rate"> 
                      <h4 ><strong style=" color: darkslategrey;"><span class="likes"><?php 
                      $likes=$ob->getLikes($q['id']);
                      foreach($likes as $Q){
                        echo $Q;
                      } ?> Likes </span></strong> 

                      &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong style=" color: darkslategrey;"> <span class="dislikes"><?php 
                      $dislikes=$ob->getDislikes($q['id']);
                      foreach($dislikes as $Q){
                        echo $Q;
                      } ?>  Dislikes</span></strong> </h4> 
                    </div>
                  <?php } ?>
                </div> 


                  <?php } } ?>

				</div>
				<div class="child">


<?php 

include "trending_post.php";
                   
            ?>



				</div>
				<div class="child">






				</div>
			</div>
		</div>
	
            <script src="../js/scripts.js"></script>
            <script src="../js/custom.js"></script>
            <link rel="stylesheet" type="text/css" href="../../css/view.css">
            <?php
            include "../Header/footer.php";

            error_reporting($errorlevel); ?>

          </body>
</html>