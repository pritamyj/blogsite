<!DOCTYPE html>
<html>

<head>
     <title>SIGN UP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body><div id="container">
<div id="header">
            <br><h1> MyBlog</h1>
        </div>
<div id="navbar">

            <ul>
                <li><a href="index.php"> <button>Back</button></a></li>
            
            </ul>
        </div>
        <div class="content" style="text-align: center;"><br><br><br><br>
               <!-- <div class="myform" > -->
     <form action="signup-check.php" method="post"  style="text-align: center;">
          <h2>SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label >Name</label><br>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>" style="width:400px"><br><br>
          <?php } else { ?>
               <input type="text" name="name" placeholder="Name" style="width:400px"><br><br>
          <?php } ?>

          <label>User Name</label><br>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"  style="width:400px"><br><br>
          <?php } else { ?>
               <input type="text" name="uname" placeholder="User Name" style="width:400px"><br><br>
          <?php } ?>


          <label>Password</label><br>
          <input type="password" name="password" placeholder="Password" style="width:400px"><br><br>

          <label>Re Password</label><br>
          <input type="password" name="re_password" placeholder="Re-enter_Password" style="width:400px"><br><br><br>

          <button type="submit">Sign Up</button>
          <a href="login1.php" class="ca">Already have an account?</a>
     </form>
     
     <!-- </div> -->
     <br><br><br><br><br><br>
          </div>
     </div>
</body>

</html>