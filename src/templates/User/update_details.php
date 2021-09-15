<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include '../autoload.php';
 

if ($_SESSION['ty'] == true) {
  $ui = $_SESSION['ui']; 

  $datas= new Index(); 
  $que = $datas->usern($ui);
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
  $url = "update_details.php?upid=$upid";
         header("Location:".$url);
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

    <link rel="stylesheet" type="text/css" href="../../css/login1register.css">

    <title>update_details</title>
  </head>

  <body>
    <?php if($_SESSION['ty'] == false){

    header("Location: ../../index.php");
    exit();
  }
if($_SESSION['ty'] == false){  
    include "../Header/navbar.php";   
  }elseif($_SESSION['ty'] == 'admin'){ 
    include "../Header/navbar_admin.php";  
  }elseif($_SESSION['ty'] == 'user'){ 
    include "../Header/navbar_user.php";  } 
    error_reporting($errorlevel);
    ?>

   <section> 
      <div class="contentBx" style="width:100%">
            <div class="formBx">
                <h2>MY DETAILS</h2>
 <form method="GET">
      <?php foreach ($que as $q) { 
 
include 'up_details_form.php';
 } ?>
                    <div class="inputBx">
                        <input type="submit" name="done" value="Update My Details">
                    </div> 
</form>

    </div>
    </div>
  
    </section>

        <script src="../js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/view.css">
                <?php
                include "../Header/footer.php"; ?>
  </html>
