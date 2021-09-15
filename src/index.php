<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include 'templates/autoload.php';
include "templates/Post/server.php";   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="css/indexadmin.css">

  <title>home</title>

</head>
<body> 

  <?php if($_SESSION['ty'] == true){
    if ($_SESSION['ty'] == 'admin') {
      header("Location: templates/Admin/admin.php");
      exit();
    }
    if($_SESSION['ty'] == 'user'){
      header("Location: templates/User/user.php");
      exit();
    } }    
include "templates/header/navbar.php";
  
    error_reporting($errorlevel);
?>

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

                    <div class="collapse navbar-collapse" id="menu" >
                        <ul class="nav navbar-nav ">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="templates/Login/login1.php">LOGIN</a></li>
                            <li><a href="templates/Login/register.php">SIGN UP</a></li>
                            <li><a href="">ABOUT</a></li>
                            <li><a href="">CONTACT</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>
 
  
  <script src="templates/js/navbar.js"></script>
 

      <div class="bg">
        <div class="hero">
          <span class="text1">Digital Diary</span>
          <span class="text2">Blogs</span> 
        </div>
      </div>

      <section class="latest-news-area" id="latest"> 
        <div class="row">
          <div class="col-sm-12">
            <div class="section_title">
              <!-- <div class="section_substitle">Blog</div> -->
              <br>
              <h2>Recent <strong>Blogs</strong></h2>
            </div>
          </div> 
        </div>
        <br><br>
        <div class="row mt-3">
          <div class="news-active"> 

            <?php
            $datas= new Index(); 
            $dataa = $datas->allposts(); 
            foreach ($dataa as $q) {
              ?>

              <div class="col-md-4" style="padding:20px;">
                <div class="latest-news-wrap">
                  <div class="news-img">
                    <img src="<?php echo $q['images']; ?>" class="img-responsive">
                    <div class="date">
                      <?php 
                      $dt= new DateTime($q['date']);
                      ?>
                      <span><?php echo $dt->format('d'); ?></span>
                      <span><?php echo $dt->format('M');?></span>
                    </div>
                  </div> 
                  <div class="news-content">
                    <h3><?php echo $q['title']; ?></h3>
                    <p > <?php echo $q['short_desc']; ?>...</p>

                    <?php 
                    
                    $a2= new Index(); 
                    $a1 = $a2->usern($q['user_id']); 
                    foreach($a1 as $u){
                      $uname= $u['username'] ;
                    }
                    ?>

                    <h4><small class="text-muted">Author: <?php echo $uname; ?></small></h4>

                    <p></p>
                    <h5><strong style=" color: darkslategrey;"><small"> <?php echo getLikes($q['id']); ?> Likes </small></strong> 

                      &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong style=" color: darkslategrey;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?> Dislikes</span></strong> </h5>

                      <p></p>
                      <div>                     
                        <a href="templates/Post/view.php?id=<?php echo $q['id']; ?>">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
              } ?><br>
            </div>
          </div>
        </section>
        <?php
        include "templates/Header/footer.php"; ?>
      </body>
      </html>


