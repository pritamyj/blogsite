<?php
include 'includes/db.inc.php';

if (isset($_REQUEST['upid'])) {
  $upid = $_REQUEST['upid'];
  $a2= new Index(); 
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
  $url = "update.php?upid=$upid";
         header("Location:".$url);
  exit();
}}


?>
<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/login1register.css">

    <title>CRUD</title>
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

      <?php 
      $uid= $_REQUEST['upid'];
      
      foreach ($que as $q) { ?>
        <form method="GET">
          <div class="inputBx">

            <input type="hidden" class="form-control" name="uid" value="<?php echo "$uid"; ?>">
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
            <input type="password" name="pa" value="<?php echo $q['password']; ?>">
          </div><br>
                    <div class="inputBx">
                        <input type="submit" name="done" value="Update User  Details">
                    </div> 
</form>
      <?php } ?>

</div>
    </div>
  
    </section>

        <script src="js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="css/view.css">
  </html>