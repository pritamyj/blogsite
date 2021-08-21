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
    $sql = "SELECT * FROM data WHERE id = $id";
    $Query = mysqli_query($conn, $sql);
}


//user home
if ($_SESSION['username'] == true) {
    $userr = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $Sql = "SELECT * FROM user WHERE username='$userr' AND password='$pass'";
    $re = mysqli_query($conn, $Sql);
    $Que = mysqli_fetch_assoc($re);
    $uid = $Que['user_id'];
}

if (isset($_REQUEST["new_post"])) {
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];

    $sql = "INSERT INTO data(title, content,date, user_id, short_desc) VALUES('$title', '$content', NOW(), '$uid', '$desc')";
    mysqli_query($conn, $sql);

    header("Location: user.php?info=added");
    exit();
}


if (isset($_REQUEST["update"])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];
    $sql = "UPDATE data SET title='$title', content='$content', short_desc='$desc' WHERE id=$id";
    mysqli_query($conn, $sql);

    if ($_SESSION['username'] == 'admin') {
        header("Location: admin.php?info=updated");
        exit();
    } else {
        header("Location: user.php?info=updated");
        exit();
    }
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM data WHERE id = $id";
    $Q = mysqli_query($conn, $sql);

    if ($_SESSION['username'] == 'admin') {

        header("Location: admin.php?info=updated");
        exit();
    } else {
        header("Location: user.php?info=deleted");
        exit();
    }
}



error_reporting($errorlevel);
?>