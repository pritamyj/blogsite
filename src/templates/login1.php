<?php
session_start();
// include "db.php";
include "config.php"; 
include "dbquery.php";
include "navbar.php";


if (isset($_REQUEST["submit"])) {
    $uname = $_REQUEST["uname"];
    $pass = $_REQUEST["password"];

    if (empty($uname)) {
        header("Location: login1.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login1.php?error=Password is required");
        exit();
    } else {

         $datas= new Login(); 
         $dataa = $datas->login_check($uname,$pass); 
         foreach ($dataa as $q) {
             
        $ty = $q['user_type'];
        $ui = $q['user_id']; 
}
 
         if (!empty($dataa)) {
            $_SESSION['username'] = $uname;
            $_SESSION['password'] = $pass;
            $_SESSION['ty'] = $ty;
            $_SESSION['ui'] = $ui;

            if(isset($_POST['rememberme'])){

                $unamee = base64_encode($uname);
                $passs = base64_encode($pass);

                setcookie('usernamecookie',$unamee, time()+86400, '/', null,null,true);
                setcookie('passwordcookie', $passs, time()+86400, '/', null, null,true);


                if ($ty == 'admin') {

                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: user.php");
                    exit();
                }
            }else{
                if ($ty == 'admin') {

                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: user.php");
                    exit();
                }
            }
        } else {
            header("Location: login1.php?error=Incorect User name or password");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login1register.css">

    <title>Login</title>


</head>
<body>
    <section>
        <div class="imgBx">
            <img src="../images/9.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form method="post">

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="uname" value="<?php if(isset($_COOKIE['usernamecookie'])){ echo base64_decode($_COOKIE['usernamecookie']);} ?>">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo base64_decode($_COOKIE['passwordcookie']);} ?>">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name="rememberme"> Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" style="font-size: 14px;" name="submit" value="Sign in">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="register.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>