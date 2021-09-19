<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include '../autoload.php'; 
?>
 
<!doctype html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="../js/navbar.js"></script> 
      <title>CRUD</title>

  </head>

  <body>
    <?php if($_SESSION['username'] == false){

        header("Location: ../../index.php");
        exit();
    }

if($_SESSION['ty'] == 'admin'){
    include "../Header/navbar_admin.php"; 
  } else{ 
    include "../Header/navbar_user.php"; }
    error_reporting($errorlevel);
    ?> 

  <script src="../js/navbar.js"></script>
        
    <div class="bg_admin">
        <div class="hero">
            <span class="text1">User Details</span>

            <a href="add_user.php" class="btn" name="add">+ Add User</a>
        </div>
    </div>

    <section class="latest-news-area" id="latest">
      <div class="container">

        <br><br>
        <table class="table">
          <thead >
            <tr >
              <th scope="col" style="text-align:center;">User ID</th>
              <th scope="col" style="text-align:center;">Full Name</th>
              <th scope="col" style="text-align:center;">Username</th>
              <th scope="col" style="text-align:center;">Operations</th>
          </tr>
      </thead>
      <tbody>
        <?php
        $data= new User(); 
        $result = $data->showalluser(); 

        foreach ($result as $q) {
          $id = $q['user_id'];
          $full_name = $q['full_name'];
          $uname = $q['username']; 

          echo '<tr>
          <th scope="row"  style="text-align:center;">' . $id . '</th>
          <td  style="text-align:center;">' . $full_name . '</td>
          <td  style="text-align:center;">' . $uname . '</td>
          <td>
          <button class="btn" ><a class=" orng" href="update.php?upid=' . $id . '" >Update</a></button>
          <button class="btn" ><a href="up_del.php?delid=' . $id . '" >Delete</a></button>
          </td>
          </tr>';

      } ?>
  </tbody>
</table>
</div>
</section>
                <?php
                include "../Header/footer.php"; ?>

      <link rel="stylesheet" type="text/css" href="../../css/user_details.css">
      <link rel="stylesheet" type="text/css" href="../../css/indexadmin.css">
</body>

</html>