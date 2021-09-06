<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php"; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/indexadmin.css"> 
  <link rel="stylesheet" type="text/css" href="stylesss.css">
  <title></title>

</head>

<body> 
  <?php if($_SESSION['username'] == false){

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
          <p><form method="POST" enctype="multipart/form-data" >
            <input type="text" name="title" placeholder="Blog Title "style="margin-bottom: 15px;"> 
            <textarea name="desc" placeholder="Short description" style=" height:80px;"></textarea>
            <textarea name="content" placeholder="Blog content" style="height:130px;"></textarea> 
            <input type="hidden" name="size" value="1000000"> 
            <input type="file" name="imgg"style="margin-bottom: 15px;"> 
            <input type="submit" name="new_post" value="Add Post">
            <!-- <button name="new_post">Add Post</button> -->
          </form></p>
        </div>
        <div class="child">
          <img src=" #" alt="Add image" class="img" >
        </div>

      </div>
    </section>

    <link rel="stylesheet" type="text/css" href="css/view.css">
    <link rel="stylesheet" type="text/css" href="stylesss.css">
  </body>

  </html> 