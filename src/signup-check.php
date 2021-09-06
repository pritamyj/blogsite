<?php
session_start();
include "db.php";

if (
	isset($_POST['uname']) && isset($_POST['password'])
	&& isset($_POST['name']) && isset($_POST['re_password'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']); 
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname=' . $uname . '&name=' . $name;


	if (empty($uname)) {
		header("Location: register.php?error=User Name is required&$user_data");
		exit();
	} else if (empty($pass)) {
		header("Location: register.php?error=Password is required&$user_data");
		exit();
	} else if (empty($re_pass)) {
		header("Location: register.php?error=Please Re-enter Password&$user_data");
		exit();
	} else if (empty($name)) {
		header("Location: register.php?error=Name is required&$user_data");
		exit();
	} else if ($pass !== $re_pass) {
		header("Location: register.php?error=The confirmation password  does not match&$user_data");
		exit();
	} else {
		
		$ch = new Register();
            $result = $ch->usern_check($uname);

		if (!empty($result)) {
			header("Location: register.php?error=The username is taken try another&$user_data");
			exit();
		} else {
			// $sql2 = "INSERT INTO user(username, password, full_name, user_type) VALUES('$uname', '$pass', '$name', 'user')";
			// $result2 = mysqli_query($conn, $sql2);
			$user= 'user';
			$insert = new Register();
            $result2 = $insert->signup_check($uname, $pass, $name, $user);
			if ($result2) {
				header("Location: register.php?success=Your account has been created successfully");
				exit();
			} else {
				header("Location: register.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: register.php");
	exit();
}