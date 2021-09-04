<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php";


if ($_SESSION['username'] == true) {
  $userr = $_SESSION['username'];
  $pass = $_SESSION['password'];

  $datas= new Login(); 
  $que = $datas->login_check($userr,$pass);
}

if (isset($_REQUEST['done'])) {
  $id = $_SESSION['ui'];
  $fn = $_REQUEST['fn'];
  $un = $_REQUEST["un"];
  $pass = $_REQUEST["pa"];
  $update= new User();
  $update->upd_mydetails($un, $pass, $fn, $id);
  if ($_SESSION['ty'] == 'admin') {

    $_SESSION['username'] = $un;
    header("Location: admin.php?info=updated");
    exit();
  }else{
 
    $_SESSION['username'] = $un;
    header("Location: user.php?info=updated");
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>update_details</title>
  </head>

  <body>
    <?php if($_SESSION['username'] == false){

      header("Location: index.php");
      exit();
    }
    error_reporting($errorlevel);
    ?>

    <div class="container">

      <?php 

      
      foreach ($que as $q) { ?>
        <form method="GET">
          <div class="mb-3">

            <input type="uid" hidden class="form-control" name="uid" value="<?php echo "$uid"; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="full_name" class="form-control" name="fn" value="<?php echo $q['full_name']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="username" class="form-control" name="un" value="<?php echo $q['username']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" name="pa" value="<?php echo $q['password']; ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="done">Submit</button>
        </form>

      <?php } ?>


    </div>


  </body>

  </html>
