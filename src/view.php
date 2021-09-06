<?php 
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php"; 
include "server.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/indexadmin.css">

	<title>User blog</title>

</head>
<body>
	<?php
	if($_SESSION['ty'] == false){  
 		include "navbar.php";   
	  }elseif($_SESSION['ty'] == 'admin'){
	  	include "navbar_admin.php"; 
	  } else{ 
	  include "navbar_user.php"; } 
	error_reporting($errorlevel);
 

	if($_SESSION['ty'] == 'admin' || $_SESSION['ty'] == false)
	{
		foreach ($queryy as $q) {   
			?> 
 
			<section class="container">
				<div class="site-content">
					<div class="posts">
						<div class="post-content">
							<div class="post-image">
								<div>
									<img src="<?php echo $q['images']; ?>" alt="blog1" class="img">
								</div>

								<?php 
								$a2= new Index(); 
								$a1 = $a2->usern($q['user_id']); 
								foreach($a1 as $u){
									$uname= $u['username'] ;
								}
								?>

								<div class="post-info">
									<span>
										&nbsp;&nbsp;Author: <?php echo $uname; ?></span>
										<span>
											&nbsp;&nbsp;Posted on: <?php echo $q['date'] ?></span>
										</div>
									</div>
									<div class="post-title"> 
										<h2><strong><?php echo $q['title'] ?></strong></h2> 
									</div>
									<div class="post-content">
										<p><?php echo $q['content'] ?></p></div>
										<?php if ($_SESSION['ty'] == 'admin') {?>

											<div class="rate">  

												<h3><i <?php if (userLiked($q['id'])): ?>
												class="fa fa-thumbs-up like-btn"
											<?php else: ?>
												class="fa fa-thumbs-o-up like-btn"
											<?php endif ?>
											data-id="<?php echo $q['id'] ?>"></i> 
											<span class="likes"><?php echo getLikes($q['id']); ?></span>

											&nbsp;&nbsp;&nbsp;&nbsp;

											<i  <?php if (userDisliked($q['id'])): ?>
											class="fa fa-thumbs-down dislike-btn"
										<?php else: ?>
											class="fa fa-thumbs-o-down dislike-btn"
										<?php endif ?>
										data-id="<?php echo $q['id'] ?>"></i> 
										<span class="dislikes"><?php echo getDislikes($q['id']); ?></span></h3> 
									</div>
								<?php }else{ ?>
									<div class="rate"> 
										<h4 ><strong style=" color: blue;"><span class="likes"><?php echo getLikes($q['id']); ?> Likes </span></strong> 

											&nbsp;&nbsp;&nbsp;&nbsp;

											<strong style=" color: red;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?>  Dislikes</span></strong> </h4> 
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php }  
				}else{  
					if(!empty($query))
					{
						foreach ($query as $q) {

							?>

							<section class="container">
								<div class="site-content">
									<div class="posts">
										<div class="post-content">
											<div class="post-image">
												<div>
													<img src="<?php echo $q['images']; ?>" alt="blog1" class="img" >
												</div>

												<?php 
												$a2= new Index(); 
												$a1 = $a2->usern($q['user_id']); 
												foreach($a1 as $u){
													$uname= $u['username'] ;
												} 
												?>

												<div class="post-info ">
													<span> 
														&nbsp;&nbsp;Author: <?php echo $uname; ?></span>
														<span> 
															&nbsp;&nbsp;Posted on: <?php echo $q['date'] ?></span>
														</div>
													</div>
													<div class="post-title "> 
														<h2><strong><?php echo $q['title'] ?></strong></h2> 
													</div>
													<div class="post-content"><p><?php echo $q['content'] ?></p></div>

													<div class="rate"> 
														<h3><i <?php if (userLiked($q['id'])): ?>
														class="fa fa-thumbs-up like-btn"
													<?php else: ?>
														class="fa fa-thumbs-o-up like-btn"
													<?php endif ?>
													data-id="<?php echo $q['id'] ?>"></i>
													<span class="likes"><?php echo getLikes($q['id']); ?></span>

													&nbsp;&nbsp;&nbsp;&nbsp;

													<i 
													<?php if (userDisliked($q['id'])): ?>
														class="fa fa-thumbs-down dislike-btn"
													<?php else: ?>
														class="fa fa-thumbs-o-down dislike-btn"
													<?php endif ?>
													data-id="<?php echo $q['id'] ?>"></i> 
													<span class="dislikes"><?php echo getDislikes($q['id']); ?></span></h3> 
												</div>
											<?php } 
										}else{
											header("Location: user.php");
											exit();
										} 

									} 
									if ($_SESSION['ty'] == true) { ?>
										<form method="POST ">
											<input type="text" hidden name="id" value="<?php echo $q['id']; ?>" >
											<button name="delete" class="btnn" style=" ">DELETE</button>
											<button class="btnn"> <a href="edit.php?id=<?php echo $q['id']; ?> " style="text-decoration: none;color: white;">EDIT</a></button> 
										</form>
									<?php } ?> 
								</div>
							</div>
						</div>
						<aside class="sidebar"> 
						</aside> 
				</section> 
        <script src="js/scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="css/view.css">
			</body>
			</html>
