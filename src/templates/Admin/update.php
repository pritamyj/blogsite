<?php
include '../autoload.php';
ob_start();

if (isset($_REQUEST['upid'])) {
  $_SESSION['upid'] = $_REQUEST['upid'];
  $upid = $_SESSION['upid'] ;
  $a2= new Index();
  echo 'hello';
  echo $upid . "/";
  $que = $a2->usern($upid);  
}

if (isset($_REQUEST['done'])) {
  $id = $_REQUEST['uid'];
  $fn = $_REQUEST['fn'];
  $un = $_REQUEST["un"];
  $pass = $_REQUEST["pa"];

  $ch = new Register();
  $result = $ch->usern_check($un);

    if (empty($result)) {
      $update= new User();
  $update->upd_mydetails($un, $pass, $fn, $id);
  $url = "user_details.php?updated"; 
  header("Location:".$url);
    exit();
    }else{ 
      $upid = $_SESSION['upid'] ;
  $url = "update.php?upid=" . $upid;
         header("Location:".$url);
  exit(); 
}}

ob_end_flush();
?>
<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../../css/login1register.css">

    <title>CRUD</title>
  </head>

  <body>
    <?php if($_SESSION['ty'] == false){

    header("Location: ../../index.php");
    exit();
  }

if($_SESSION['ty'] == 'admin'){
    include "../Header/navbar_admin.php"; 
  } else{ 
    include "../Header/navbar_user.php"; }?>

   <section> 
      <div class="contentBx" style="width:100%">
            <div class="formBx">
                <h1>UPDATE USER</h1>
  <form method="GET">
      <?php 
      $uid= $_REQUEST['upid'];
      
      foreach ($que as $q) { 
     
include '../User/up_details_form.php';
        } ?>
                    <div class="inputBx">
                        <input type="submit" name="done" value="Update User Details">
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