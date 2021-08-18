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

		$sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
		$rowcount = mysqli_num_rows($result);
		if ($rowcount == true) {
			$_SESSION['username'] = $uname;
			if ($uname == 'admin') {

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
	<div id="">
		<div id="navbar">
			<ul>
				<li><a href="index.php">HOME</a></li>
			</ul>
		</div>
		<div class="contain">
			<div class="myform">
				<form method="post">
					<h2>LOGIN</h2>
					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>
					<input type="text" name="uname" placeholder="User Name"><br><br>

					<input type="password" name="password" placeholder="Password"><br><br>

					<button type="submit" name="submit">Login</button>
					<a href="register.php" class="ca">Already have an account</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>