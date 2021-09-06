<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php";
 
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
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>ADD USER</title>
</head>

<body>
<?php if($_SESSION['username'] == false){

    header("Location: index.php");
        exit();
   }
    error_reporting($errorlevel);
    ?>
  
  <div class="container">

  
                <form method="GET">
               
                     <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="full_name" class="form-control" name="fn" >
      </div>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="username" class="form-control" name="un">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="pa">
      </div>
      <button type="submit" class="btn btn-primary" name="ADD">Add User</button>
                </form>

           

           
  </div>


</body>

</html>