<?php
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
   <link rel="stylesheet" type="text/css" href="../css/index_&_admin.css"> 
  <link rel="stylesheet" type="text/css" href="../css/view.css">
    
    <title>All blog</title>

</head>

<body>

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
                        <ul class="nav navbar-nav" style="padding:auto;text-align: center;">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="login1.php">LOGIN</a></li>
                            <li><a href="register.php">SIGN UP</a></li>
                            <li><a href="">ABOUT</a></li>
                            <li><a href="">CONTACT</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>

            <?php foreach ($Queryy as $q) { ?>
<br><br><br>
     <section class="container">
      <div class="site-content">
        <div class="posts">
          <div class="post-content">
            <div class="post-image">
              <div>
                <img src="<?php echo $q['images']; ?>" alt="blog1" class="img" style="height: 460px; width: 800px;">
              </div>
              <?php $un = $q['user_id'];
                $a2= new Index(); 
                $uname = $a2->author($q['user_id']); 
                ?>
                <div class="post-info">
                          <span> 
                            &nbsp;&nbsp;Author: <?php echo $uname; ?></span>
                            <span> 
                              &nbsp;&nbsp;Posted on: <?php echo $q['date'] ?></span>
                            </div>
                          </div>
              </div>
                <div class=" ">
                  <h2><strong><?php echo $q['title'] ?></strong></h2>
                <p style="color: #454343; font-size: 1.8rem;"><?php echo $q['content'] ?></p>
                 
              <br>
                  <div class=" "> 
                    <h4 ><strong style=" color: blue;"><span class="likes"><?php echo getLikes($q['id']); ?> Likes </span></strong> 

                  &nbsp;&nbsp;&nbsp;&nbsp;
 
                <strong style=" color: red;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?>  Dislikes</span></strong> </h4> 
              </div><br><br>
              </div>
              </div>
            </div> 
        </section><?php } ?> 
</body>

</html>