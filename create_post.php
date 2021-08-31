<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>

<body>
    <?php if($_SESSION['username'] == false){

    header("Location: index.php");
        exit();
   }
    error_reporting($errorlevel);
    ?>
    
<div id="container">
<div id="header">
            <br><h1> MyBlog</h1>
        </div>
<div id="navbar">

            <ul>
                <li><a href="user.php"> <button>Back</button></a></li>
            
            </ul>
        </div>
    <div id="content">
        <div style="text-align: center;">
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Blog Title" style="width:400px"><br>
                <textarea name="desc" placeholder="Short description" style="width:400px ;height:80px ;"></textarea><br><br>
                <textarea name="content" placeholder="Blog content" style="width:400px ;height:130px ;"></textarea><br><br>
                <input type="hidden" name="size" value="1000000"><br><br>
                <input type="file" name="imgg"><br><br>
                <button name="new_post">Add Post</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>