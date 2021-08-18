<!DOCTYPE html>
<html>

<head>
     <title>SIGN UP</title>
     <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>

<body>
     <form action="signup-check.php" method="post">
          <h2>SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br><br>
          <?php } else { ?>
               <input type="text" name="name" placeholder="Name"><br><br>
          <?php } ?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br><br>
          <?php } else { ?>
               <input type="text" name="uname" placeholder="User Name"><br><br>
          <?php } ?>


          <label>Password</label>
          <input type="password" name="password" placeholder="Password"><br><br>

          <label>Re Password</label>
          <input type="password" name="re_password" placeholder="Re-enter_Password"><br><br><br>

          <button type="submit">Sign Up</button>
          <a href="login1.php" class="ca">Already have an account?</a>
     </form>
     <br> <a href="index.php"> <button>Back</button></a>
</body>

</html>