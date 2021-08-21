<?php
session_start();
include "db.php";

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


		    $Sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";
    $re = mysqli_query($conn, $Sql);
    $Que = mysqli_fetch_assoc($re);
$ty = $Que['user_type'];

		$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == true) {
			$_SESSION['username'] = $uname;
			$_SESSION['password'] = $pass;
			$_SESSION['ty'] = $ty;
			if ($ty == 'admin') {

				header("Location: admin.php");
				exit();
			} else {
				header("Location: user.php");
				exit();
			}
		} else {
			header("Location: login1.php?error=Incorect User name or password");
			exit();
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="container">
<div id="header">
            <br><h1> MyBlog</h1>
        </div>
<div id="navbar">

            <ul>
                <li><a href="index.php"> <button>Back</button></a></li>
            
            </ul>
        </div>
        <div class="content" style="text-align: center;"><br><br><br><br>
			<div class="myform" >
				<form method="post" style="text-align: center;">
					<h2>LOGIN</h2><br><br>
					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>
					<input type="text" name="uname" placeholder="User Name" style="width:400px"><br><br>

					<input type="password" name="password" placeholder="Password" style="width:400px"><br><br>

					<button type="submit" name="submit">Login</button>
					<a href="register.php" class="ca">   Already have an account</a>
				</form>
			</div><br><br><br><br><br><br>
		</div>
	</div>
</body>

</html>