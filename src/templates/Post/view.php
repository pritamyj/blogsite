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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/indexadmin.css">   

	<title>User blog</title>
	 
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

		if($_SESSION['ty'] == 'admin' || $_SESSION['ty'] == false)
		{
			
    $data = new User(); 
    $queryy = $data->selectedposts($id);
    
			foreach ($queryy as $q) {   
				?> 

				<section class="container">
					<div class="site-content">
						<div class="posts">
							<div class="post_content">
								<div class="post-image">
									<div>
										<img src="../../<?php echo $q['images']; ?>" alt="blog1" class="img">
									</div>

									<?php 
									$a2= new Index(); 
									$a1 = $a2->usern($q['user_id']); 
									foreach($a1 as $u){
										$uname= $u['username'] ;
									}
									?>

									<!-- <div class="post-info">
										
									</div> -->
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
												<h4 ><strong style=" color: darkslategrey;"><span class="likes"><?php echo getLikes($q['id']); ?> Likes </span></strong> 

													&nbsp;&nbsp;&nbsp;&nbsp;

													<strong style=" color: darkslategrey;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?>  Dislikes</span></strong> </h4> 
												</div>
											<?php } ?>
										</div> 
									</div>

								</div>
							<?php }  
						}else{ 
    $query = $data->selectedpostuser($id, $ui);
 
							if(!empty($query))
							{
								foreach ($query as $q) {

									?>

									<section class="container">
										<div class="site-content">
											<div class="posts">
												<div class="post_content">
													<div class="post-image">
														<div>
															<img src="../../<?php echo $q['images']; ?>" alt="blog1" class="img" >
														</div>

														<?php 
														$a2= new Index(); 
														$a1 = $a2->usern($q['user_id']); 
														foreach($a1 as $u){
															$uname= $u['username'] ;
														} 
														?>

													<!-- <div class="post-info ">
														
													</div> -->
												</div>
												<div class="post_title "> 
													<h2><strong><?php echo $q['title'] ?></strong></h2> 
												</div>
												<div class="post_content"><p><?php echo $q['content'] ?></p>
													<h4><span>Author: <?php echo $uname; ?></span>
														<span style="float: right;"> Posted on: <?php echo $q['date'] ?></span></div>
														</h4>
														<?php
														include "view_likes.php"; 

													} 
												}else{
													header("Location: ../User/user.php");
													exit();
												} 

											} 
											if ($_SESSION['ty'] == true) { ?>
												<form method="POST ">
													<input type="text" hidden name="id" value="<?php echo $q['id']; ?>" >
													<button name="delete" class="btnn" >DELETE</button>
													<button class="btnn"> <a href="edit.php?id=<?php echo $q['id']; ?> " style="text-decoration: none;color: white;">EDIT</a></button> <br><br><br><br><br>
												</form>
											<?php } ?> 
										</div>
									</div>
								</div>

							</section> 

							<?php if ($_SESSION['ty'] == 'admin' || $_SESSION['ty'] == 'user') { 
								?>
								<section class="container">
									<div class="post-comment">
										<!-- <div class="posts"> -->
											<div class="card-header">
												<h3> comments</h3>
											</div>
											<div class="card-body">

												<div class="main-comment"> 
													<div id="error_status"></div>
													<textarea class="comment_textbox" rows="3"></textarea>
													<button type="button" class="btn add_comment_btn">comment</button>
												</div>
												<hr>
												<div class="comment-container"> 
												</div>

											</div>
											<!-- </div>	 -->
										</div>
									</section>
								<?php } ?>
								<?php
								include "../Header/footer.php";
								 
		error_reporting($errorlevel); ?>
								<script src="../js/scripts.js"></script>
								<script src="../js/custom.js"></script>
								<link rel="stylesheet" type="text/css" href="../../css/view.css">


							</body>
							</html>
