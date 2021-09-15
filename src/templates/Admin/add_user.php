<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include '../autoload.php';

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
    
    <link rel="stylesheet" type="text/css" href="../../css/login1register.css">

    <title>ADD USER</title>
  </head>

  <body>
    <?php if($_SESSION['ty'] == false){

    header("Location: ../../index.php");
    exit();
  }
  if($_SESSION['ty'] == 'admin'){
    include "../Header/navbar_admin.php"; 
  } else{ 
    include "../Header/navbar_user.php"; }
    error_reporting($errorlevel);
    ?>
    
    
    <section>

      <div class="contentBx" style="width:100%">
            <div class="formBx">
                <h2>ADD USER</h2>
                <form action="../Login/signup-check.php" method="post">
      <?php           
include "../Login/register_form.php";
          ?> 
        </form>
</div>
    </div>
  
    </section>


        <script src="../js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/view.css">
  
                <?php
                include "../Header/footer.php"; ?>
</body>

</html>