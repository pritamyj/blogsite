<?php
include "db.php";
include "nav.php";

if ($_SESSION['username'] == true) {
    $userr = $_SESSION['username'];
    $Sql = "SELECT * from user WHERE username = '$userr'";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <title></title>
</head>

<body>

    <div class="">
        <div>
            <form method="GET">
                <input type="text" name="title" placeholder="Blog Title"><br><br>
                <textarea name="desc" placeholder="Short description"></textarea><br><br>
                <textarea name="content" placeholder="Blog content"></textarea>
                <button name="new_post">Add Post</button>
            </form>
            <br> <a href="user.php"> <button>Back</button></a>
        </div>

    </div>
    
</body>

</html>