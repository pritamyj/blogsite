<?php
 
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'blog');
if (!$conn) {
    echo "<h3>Not able to established Database Connection</h3>";
}




if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $ui= $_SESSION['ui'];
    $sql = "SELECT * FROM data WHERE id = $id AND user_id=$ui";
    $Query = mysqli_query($conn, $sql);
    
    $sl = "SELECT * FROM data WHERE id = $id";
    $Queryy = mysqli_query($conn, $sl);
  
}


 
if ($_SESSION['username'] == true) {
    $userr = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $Sql = "SELECT * FROM user WHERE username='$userr' AND password='$pass'";
    $re = mysqli_query($conn, $Sql);
    $Que = mysqli_fetch_assoc($re);
    $uid = $Que['user_id'];
}




if (isset($_REQUEST["new_post"])) {
    $file=$_FILES['imgg']; 
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $filedest="images/".$filename;
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];


    if ($fileerror == 0) {
        
        if (move_uploaded_file($filepath, $filedest)) {    

    $sql = "INSERT INTO data(title, content, user_id, short_desc, images) VALUES('$title', '$content', '$uid', '$desc', '$filedest')";
    mysqli_query($conn, $sql);

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
    $filedest="images/".$filename;
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];


 if ($fileerror == 0) {
        
        if (move_uploaded_file($filepath, $filedest)) {    

    $sql = "UPDATE data SET title='$title', content='$content', short_desc='$desc', images='$filedest' WHERE id=$id";
    mysqli_query($conn, $sql);

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

    $sql = "DELETE FROM data WHERE id = $id";
    $Q = mysqli_query($conn, $sql);

    if ($_SESSION['ty'] == 'admin') {

        header("Location: admin.php?info=updated");
        exit();
    } else {
        header("Location: user.php?info=deleted");
        exit();
    }
}



error_reporting($errorlevel);
?>
