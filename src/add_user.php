<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include 'includes/db.inc.php';

if (isset($_REQUEST['ADD'])) {
  $fn = $_REQUEST['fn'];
  $un = $_REQUEST["un"];
  $pass = $_REQUEST["pa"];
  $user= 'user';
  $insert = new User();
  $result2 = $insert->Adduser($un, $pass, $fn, $user);
  header("Location: user_details.php?info=added");
  exit();
}


?>
<!doctype html>
  <html lang="en">

  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="css/login1register.css">

    <title>ADD USER</title>
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
    
   
    <section>

      <div class="contentBx" style="width:100%">
            <div class="formBx">
                <h2>ADD USER</h2>
      <form action="signup-check.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                     <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                     <p class="success"><?php echo $_GET['success']; ?></p>
                     <?php } ?>

                    <div class="inputBx">
                        <span>Name</span>
                        <?php if (isset($_GET['name'])) { ?>
                            <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
                        <?php } else { ?>
                         <input type="text" name="name">
                        <?php } ?>
                    </div>

                    <div class="inputBx">
                        <span>Username</span>
                        <?php if (isset($_GET['uname'])) { ?>
                            <input type="text" name="uname" value="<?php echo $_GET['uname']; ?>">
                        <?php } else { ?>
                         <input type="text" name="uname">
                        <?php } ?>
                    </div>

                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>

                    <div class="inputBx">
                        <span>Re-enter Password</span>
                        <input type="password" name="re_password">
                    </div><br>

                    <div class="inputBx">
                        <input type="submit" name="submit" value="Add User">
                    </div> 
                </form>
</div>
    </div>
  
    </section>


        <script src="js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="css/view.css">
</body>

</html>