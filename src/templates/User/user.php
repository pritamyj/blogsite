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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="../js/navbar.js"></script> 
  <title>User blog</title>
 
</script>
</head>
<body>

  <?php
  if ($_SESSION['ty'] == true) {
    if ($_SESSION['ty'] == 'admin') {
      $n= $_SESSION['username']; 
      $ui= $_SESSION['ui']; ; 
    } else {
     $n= $_SESSION['username']; 
     $ui= $_SESSION['ui'];  
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
    include "../Header/navbar_user.php";  } 
     ?>

<div class="bg_admin">
  <div class="hero">

    <?php
    if ($_SESSION['username'] == true) {
      $n= $_SESSION['username'];
      if ($_SESSION['ty'] == 'admin') {
        ?>
        <span class="text1">My Blogs</span>

        <?php

      }else {
        ?>
        <span class="text1">Welcome </span>
        <span class="text2"><?php echo $n; ?></span>
        <?php
      }

    } else {
      header("Location: ../../index.php");
      exit();
    }  ?>
    <a href="../Post/create_post.php" class="btn">+ Create New Post</a>
  </div>
</div>

<section class="latest-news-area" id="latest">
  <div class="row">
    <div class="col-sm-12">
      <div class="section_title"> <br>

        <?php
        if ($_SESSION['ty'] == 'admin') {
          ?>
          <h2><strong>Blogs</strong></h2>
          <?php

        }else {
          ?>
          <h2>All <strong>Blogs</strong></h2>
        <?php } ?>

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

  <link rel="stylesheet" type="text/css" href="../../css/indexadmin.css">
      <?php
      $data = new User();
      $Queryy=$data->userposts($ui);
      foreach ($Queryy as $q) {  

        include "../Post/container.php";
         } ?><br> 
      </div>
    </div> 
  </section> 

  <?php
  include "../Header/footer.php"; ?>
</body>
</html>


