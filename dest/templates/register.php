<?php 
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/login1_&_register.css">
    
    <title>Login</title>

</head>
<body>
    <section>
        <div class="imgBx">
            <img src="../images/13.jpg"> 
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>SIGN UP</h2>
                <form action="signup-check.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                     <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                     <p class="success"><?php echo $_GET['success']; ?></p>
                     <?php } ?>

                    <div class="inputBx">
                        <span>Name</span>
                        <?php if (isset($_GET['name'])) { ?>
                            <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
                        <?php } else { ?>
                         <input type="text" name="name">
                        <?php } ?>
                    </div>

                    <div class="inputBx">
                        <span>Username</span>
                        <?php if (isset($_GET['uname'])) { ?>
                            <input type="text" name="uname" value="<?php echo $_GET['uname']; ?>">
                        <?php } else { ?>
                         <input type="text" name="uname">
                        <?php } ?>
                    </div>

                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>

                    <div class="inputBx">
                        <span>Re-enter Password</span>
                        <input type="password" name="re_password">
                    </div><br>

                    <div class="inputBx">
                        <input type="submit" style="font-size: 14px;" name="submit" value="Sign up">
                    </div>

                    <div class="inputBx">
                        <p>Already have an account? <a href="login1.php">login</a></p>
                    </div>
                </form>
            </div>
        </div>
</section>
</body>
</html>