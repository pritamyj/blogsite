<?php
include "db.php";

if (isset($_REQUEST['upid'])) {
  $id = $_REQUEST['upid'];
  $a2= new Index(); 
  $que = $a2->usern($id);  
}

if (isset($_REQUEST['done'])) {
  $id = $_REQUEST['uid'];
  $fn = $_REQUEST['fn'];
  $un = $_REQUEST["un"];
  $pass = $_REQUEST["pa"];
  // $sql = "UPDATE user SET full_name='$fn', username='$un', password='$pass' WHERE user_id=$id";
  // mysqli_query($conn, $sql);
  $update= new User();
  $update->upd_mydetails($un, $pass, $fn, $id);
  header("Location: user_details.php?info=updated");
  exit();
}


?>
<!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>CRUD</title>
  </head>

  <body>
    <div class="container">

      <?php 
      $uid= $_REQUEST['upid'];
      
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
            <input type="password" class="form-control" name="pa" value="<?php echo $q['password']; ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="done">Submit</button>
        </form>

      <?php } ?>


    </div>


  </body>

  </html>