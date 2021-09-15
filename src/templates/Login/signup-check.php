<?php
session_start();
include '../autoload.php';

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
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=User Name is required&$user_data");
		exit();
		}else{
		header("Location: register.php?error=User Name is required&$user_data");
		exit();
	    }
	} else if (empty($pass)) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=Password is required&$user_data");
		exit();
		}else{
		header("Location: register.php?error=Password is required&$user_data");
		exit();
	}
	} else if (empty($re_pass)) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=Please Re-enter Password&$user_data");
		exit();
		}else{
		header("Location: register.php?error=Please Re-enter Password&$user_data");
		exit();
	}
	} else if (empty($name)) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=Name is required&$user_data");
		exit();
		}else{
		header("Location: register.php?error=Name is required&$user_data");
		exit();
	}
	} else if ($pass !== $re_pass) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=The confirmation password  does not match&$user_data");
		exit();
		}else{
		header("Location: register.php?error=The confirmation password  does not match&$user_data");
		exit();
	}
	} else {
		
		$ch = new Register();
            $result = $ch->usern_check($uname);

		if (!empty($result)) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/add_user.php?error=The username is taken try another&$user_data");
		exit();
		}else{
			header("Location: register.php?error=The username is taken try another&$user_data");
			exit();
		}
		} else { 
			$user= 'user';
			$insert = new Register();
            $result2 = $insert->signup_check($uname, $pass, $name, $user);
			if ($result2) {
		if($_SESSION['ty'] == true){
         header("Location: ../Admin/user_details.php?error=success=Your account has been created successfully");
		exit();
		}else{
				header("Location: register.php?success=Your account has been created successfully");
				exit();
			}
			} elseif($_SESSION['ty'] == true){
         header("Location: ../Admin/user_details.php?error=unknown error occurred&$user_data");
		exit();
		}else{
				header("Location: register.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: register.php");
	exit();
}
