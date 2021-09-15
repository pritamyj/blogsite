 <?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script
src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="css/indexadmin.css"> -->

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

            <?php
             if($_SESSION['ty']==false){ ?>
            <li><a href="../../index.php">HOME</a></li>
            <li><a href="../Login/login1.php">LOGIN</a></li>
            <li><a href="../Login/register.php">SIGN UP</a></li>
            <li><a href="">ABOUT</a></li>
            <li><a href="">CONTACT</a></li>
          <?php
           }elseif($_SESSION['ty']=='admin'){?>
            <li><a href="../Admin/admin.php" >HOME</a></li>
            <li><a href="../User/user.php">MY POSTS</a></li>
            <li><a href="../Admin/user_details.php">USER DETAILS</a></li>
            <li><a href="../User/update_details.php">DETAILS</a></li>
            <li><a href="../Login/logout.php">LOGOUT</a></li>
          <?php 
        }elseif ($_SESSION['ty']=='user') {?>
            <li><a href="../User/user.php">MY POSTS</a></li>
            <li><a href="../User/update_details.php">DETAILS</a></li>
            <li><a href="../Login/logout.php">LOGOUT</a></li>?>
        <?php } ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</header><?php
error_reporting($errorlevel);
    ?>
