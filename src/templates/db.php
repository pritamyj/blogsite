<?php

$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "config.php";
include "dbquery.php";
$conn = mysqli_connect('localhost', 'root', '', 'blog');
if (!$conn) {
    echo "<h3>Not able to established Database Connection</h3>";
}


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $ui= $_SESSION['ui'];
    $sql = "SELECT * FROM data WHERE id = $id AND user_id=$ui";
    $Query = mysqli_query($conn, $sql);
    
    $sl = "SELECT * FROM data WHERE id = $id ";
    $Queryy = mysqli_query($conn, $sl);
    
}


if ($_SESSION['username'] == true) {
    $userr = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $datas= new Login(); 
    $dataa = $datas->login_check($userr,$pass); 
    foreach ($dataa as $q) { 
        $uid = $q['user_id'];
}
}

if (isset($_REQUEST["new_post"])) {
    $file=$_FILES['imgg']; 
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $filedest="../images/".$filename;
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];
    

    if ($fileerror == 0) {
        
        if (move_uploaded_file($filepath, $filedest)) {   
            $insert = new User();
            $insert->insert($title, $content, $uid, $desc, $filedest);
        }
    }
     
    header("Location: user.php?info=added");
    exit();
}


if (isset($_REQUEST["update"])) {
    $id = $_REQUEST['id'];
    $file=$_FILES['imgg']; 
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $filedest="../images/".$filename;
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];

    if ($fileerror == 0) {
        
        if (move_uploaded_file($filepath, $filedest)) {    

            $update = new User();
            $update->update($title, $content, $desc, $filedest, $id);

            if ($_SESSION['ty'] == 'admin') {
                header("Location: admin.php?info=updated");
                exit();
            } else {
                header("Location: user.php?info=updated");
                exit();
            }
        }
    }
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $delete = new User();
            $delete->delete($id);

    if ($_SESSION['ty'] == 'admin') {

        header("Location: admin.php?info=deleted");
        exit();
    } else {
        header("Location: user.php?info=deleted");
        exit();
    }
}

error_reporting($errorlevel);
?>