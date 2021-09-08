<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include 'includes/db.inc.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
  <title></title>

</head>

<body> 
  <?php if($_SESSION['ty'] == false){

    header("Location: index.php");
    exit();
  }
  if($_SESSION['ty'] == false){  
    include "navbar.php";   
  }elseif($_SESSION['ty'] == 'admin'){
    include "navbar_admin.php"; 
  } else{ 
    include "navbar_user.php"; }
    error_reporting($errorlevel);
    ?>
    <section class="gp">
      <h1>Create New Post</h1>
      <div class="p">
        <div class="child">
          <img src="#" id="thumb" alt="Add image" class="img" >
        </div>
         <div class="child"> 
          <p><form method="POST" enctype="multipart/form-data" >
            <input type="text" name="title" placeholder="Blog Title "style="margin-bottom: 15px;"> 
            <!-- <textarea name="desc" placeholder="Short description" style=" height:80px;"></textarea> -->
            <textarea name="content" placeholder="Blog content" style="height:185px;"></textarea> 
            <input type="hidden" name="size" value="1000000"> 
            <input type="file" name="imgg" onchange="preview()" style="margin-bottom: 15px;"> 
            <input type="submit" name="new_post" value="Add Post"> 
          </form></p>
        </div>
      </div>
    </section>

    <link rel="stylesheet" type="text/css" href="css/view.css">
    <link rel="stylesheet" type="text/css" href="css/create_post.css">
<script src="js/imgdisp.js"></script>


  </body>

  </html> 