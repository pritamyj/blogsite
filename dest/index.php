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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/indexadmin.css">

  <title>home</title> 
</head>

<body>


  <header>
    <div class="navbar navbar-fixed-top">
      <div class="container">
        <div class="wrap">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand"><a href="" class="logo-image">
                <img src="../../images/DD.png" class="img-fluid"> </a>
            </div>
          </div>

        </div>

        <div class="collapse navbar-collapse" id="menu">
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
          <br>
          <br>
          <h2>Recent <strong>Blogs</strong></h2>
        </div>
      </div>
    </div>
    <br><br>
    <div class="row mt-3">
      <div class="news-active">

        <?php
        $datas = new Index();
        $dataa = $datas->allposts();
        foreach ($dataa as $q) {
        ?>

          <div class="col-md-4" style="padding:20px;">
            <div class="latest-news-wrap">
              <div class="news-img">
                <img src="<?php echo $q['images']; ?>" class="img-responsive">
                <div class="date">
                  <?php
                  $dt = new DateTime($q['date']);
                  ?>
                  <span><?php echo $dt->format('d'); ?></span>
                  <span><?php echo $dt->format('M'); ?></span>
                </div>
              </div>
              <div class="news-content">
                <h3><?php
                    echo substr($q['title'], 0, 20);
                    if (strlen($q['title']) > 20) {
                      echo "...";
                    }
                    ?></h3>
                <p> <?php echo substr($q['content'], 0, 180); ?>...</p>

                <?php

                $ob = new LikeDislike();
                $a2 = new Index();
                $a1 = $a2->usern($q['user_id']);
                foreach ($a1 as $u) {
                  $uname = $u['username'];
                }
                ?>

                <h4><small class="text-muted">Author: <?php echo $uname; ?></small></h4>

                <h5><strong style=" color: darkslategrey;">
                    <small">
                      <?php
                      $likes = $ob->getLikes($q['id']);
                      foreach ($likes as $Q) {
                        echo $Q;
                      } ?> Likes </small>
                  </strong>

                  &nbsp;&nbsp;&nbsp;&nbsp;

                  <strong style=" color: darkslategrey;"> <span class="dislikes">
                      <?php
                      $dislikes = $ob->getDislikes($q['id']);
                      foreach ($dislikes as $Q) {
                        echo $Q;
                      } ?> Dislikes</span></strong>
                </h5>

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
  include "templates/Header/footer.php";
  error_reporting($errorlevel);
  ?>
</body>

</html>