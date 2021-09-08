<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include 'includes/db.inc.php';


if ($_SESSION['ty'] == true) {
  $userr = $_SESSION['username'];
  $pass = $_SESSION['password'];

  $datas= new Login(); 
  $que = $datas->login_check($userr,$pass);
}

if (isset($_REQUEST['done'])) {
  $upid = $_SESSION['ui'];
  $fn = $_REQUEST['fn'];
  $un = $_REQUEST["un"];
  $pass = $_REQUEST["pa"];

$ch = new Register();
            $result = $ch->usern_check($un);

    if (empty($result)) {
      $update= new User();
  $update->upd_mydetails($un, $pass, $fn, $upid);
  $url = "user.php?updated";
  $_SESSION['username']=$un;
  $_SESSION['password']=$pass;
  header("Location:".$url);
    exit();
    }else{ 
  $url = "update.php?upid=$upid";
         header("Location:".$url.$urll);
  exit();
} 
}




?>
<!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/login1register.css">

    <title>update_details</title>
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

      <?php foreach ($que as $q) { ?>

        <form method="GET">
          <div class="inputBx"> 
            <input type="hidden" name="uid" value="<?php echo "$uid"; ?>">
          </div>
          <div class="inputBx">
            <span>Full Name</span>
            <input type="full_name" name="fn" value="<?php echo $q['full_name']; ?>">
          </div>
          <div class="inputBx">
            <span>Username</span>
            <input type="username" name="un" value="<?php echo $q['username']; ?>">
          </div>
          <div class="inputBx">
            <span>Password</span>
            <input type="text" name="pa" value="<?php echo $q['password']; ?>">
          </div><br>
                    <div class="inputBx">
                        <input type="submit" name="done" value="Update My Details">
                    </div> 
        </form>

      <?php } ?>

    </div>
    </div>
  
    </section>

        <script src="js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="css/view.css">
  </html>
