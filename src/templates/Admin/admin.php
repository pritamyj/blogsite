<?php
session_start();
include '../autoload.php'; 
include "../Post/server.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<title>home</title>

</head>
<body>

	<?php
	if ($_SESSION['username'] == true) {
		if ($_SESSION['ty'] == 'admin') {
			$n= $_SESSION['username'];
		} else {
			echo "Welcome" . " " . $_SESSION['username'];
		}
	} else {
		header("Location: ../../index.php"); 
		exit();
	} 
if($_SESSION['ty'] == false){  
    include "../Header/navbar.php";   
  }elseif($_SESSION['ty'] == 'admin'){ 
    include "../Header/navbar_admin.php";  
  }elseif($_SESSION['ty'] == 'user'){ 
    include "../Header/navbar_user.php";  }?>

	<script src="../js/navbar.js"></script>  
	<link rel="stylesheet" type="text/css" href="../../css/indexadmin.css">   

	<div class="bg_admin">
		<div class="hero">
			<span class="text1">Welcome </span>
			<span class="text2"><?php echo $n; ?></span> 
		</div>
	</div>

	<section class="latest-news-area" id="latest">

		<div class="row">
			<div class="col-sm-12">
				<div class="section_title"> 
					<br>
					<h2>All <strong>Blogs</strong></h2>
				</div>
			</div> 
		</div>
		<br><br>

		<div  style="text-indent: 170px; ">
  <?php
    include "../Post/notification.php";
    ?>
    
		</div> 
		<div class="row mt-4">
			<div class="news-active">

				<?php
				$datas= new Index(); 
				$dataa = $datas->allposts(); 
				foreach ($dataa as $q) {
					  
        include "../Post/container.php";
						  } ?><br> 
					</div>
				</div> 
			</section>

			<?php
			include "../Header/footer.php"; ?>
		</body>
		</html>


