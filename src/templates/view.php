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
  <link rel="stylesheet" type="text/css" href="../css/index_&_admin.css"> 
  <link rel="stylesheet" type="text/css" href="../css/view.css">

  <title>User blog</title>

</head>
<body>

  <?php if($_SESSION['ty'] == true){ 
    if($_SESSION['ty'] == 'admin'){ ?>
  
  <header>
    <div class="navbar navbar-fixed-top">
      <div class="container">
        <div class="">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" >
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>     
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span>                        
            </button>

            <a href="" class="navbar-brand">LOGO</a>

          </div>

          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
              <li><a href="admin.php" >HOME</a></li>
              <li><a href="user.php">MY POST</a></li>
              <li><a href="user_details.php">USER DETAILS</a></li>
              <li><a href="update_details.php">DETAILS</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
            </ul>
          </div> 
        </div>
      </div>
    </div>
  </header>

   <?php }else{ ?>

<header>
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" >
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>     
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span>                        
                        </button>

                        <a href="" class="navbar-brand">LOGO</a>

                    </div>

                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav">
                            <li><a href="user.php">MY POSTS</a></li>
                            <li><a href="update_details.php">DETAILS</a></li>
                            <li><a href="logout.php">LOGOUT</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>

   <?php }
 }else{
    header("Location: index.php");
    exit();
  }
  error_reporting($errorlevel);
  ?>


  
  <?php

  if($_SESSION['ty'] == 'admin')
  {
    foreach ($Queryy as $q) {   
     ?> 

     <br><br><br><br><br>
     <section class="container">
      <div class="site-content">
        <div class="posts">
          <div class="post-content">
            <div class="post-image">
              <div>
                <img src="<?php echo $q['images']; ?>" alt="blog1" class="img" style="height: 460px; width: 800px;">
              </div>
 
              <?php $un = $q['user_id'];
              $Sql = "SELECT * from user WHERE user_id = '$un'";
              $re = mysqli_query($conn, $Sql);
              $Que = mysqli_fetch_assoc($re);
              $uname = $Que['username'];
              $i=$q['id'];
              ?>

              <div class="post-info">
                <span>
                  &nbsp;&nbsp;Author: <?php echo $uname; ?></span>
                  <span>
                    &nbsp;&nbsp;Posted on: <?php echo $q['date'] ?></span>
                  </div>
                </div>
                <div class="post-title"><br>
                  <h2><strong><?php echo $q['title'] ?></strong></h2> 
                  <p style="color: #454343; font-size: 1.8rem;"><?php echo $q['content'] ?></p>

                  <div class="">  
                   
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
              </div>
              </div>
            </div>
            </div>
            <?php }  
          }else{ 
            $Row=mysqli_num_rows($Query);
            if($Row)
            {
             foreach ($Query as $q) {

               ?>

               <br><br><br><br><br>
               <section class="container">
                <div class="site-content">
                  <div class="posts">
                    <div class="post-content">
                      <div class="post-image">
                        <div>
                          <img src="<?php echo $q['images']; ?>" alt="blog1" class="img" style="height: 460px; width: 800px;">
                        </div>

                        <?php $un = $q['user_id'];
                        $Sql = "SELECT * from user WHERE user_id = '$un'";
                        $re = mysqli_query($conn, $Sql);
                        $Que = mysqli_fetch_assoc($re);
                        $uname = $Que['username'];
                        $i=$q['id'];
                        ?>

                        <div class="post-info ">
                          <span> 
                            &nbsp;&nbsp;Author: <?php echo $uname; ?></span>
                            <span> 
                              &nbsp;&nbsp;Posted on: <?php echo $q['date'] ?></span>
                            </div>
                          </div>
                          <div class="post-title "><br>
                            <h2><strong><?php echo $q['title'] ?></strong></h2> 
                            <p style="color: #454343; font-size: 1.8rem;"><?php echo $q['content'] ?></p>
                            
                            <div class=" "> 
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

                   } ?>
                   <form method="POST" style="display: inline-block;padding-top: 0;">
                    <input type="text" hidden name="id" value="<?php echo $q['id']; ?>" >
                    <button name="delete" class="btnn" style="color: white;font-size: 1.8rem; ">DELETE</button>
                    <button class="btnn"> <a href="edit.php?id=<?php echo $q['id']; ?>", style="text-decoration: none;color: white;font-size: 1.8rem; ">EDIT</a></button><br><br>
                  </form></div> 
                </div>
              </div>
            </div>
            <aside class="sidebar"> 
            </aside>
          </div>
        </section>
        <script src="../js/scripts.js"></script>
      </body>
      </html>
