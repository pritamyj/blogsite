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
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <li><?php
        if ($_SESSION['username'] == 'admin') { ?>
             <a href="admin.php"> <button>Back</button></a>
        <?php } else {
        ?><a href="user.php"><button>Back</button></a><?php
                                                            } ?></li>
            
            </ul>
        </div>
        <div class="content">
<div style="text-align: center;">
            <?php foreach ($Query as $q) { ?>
                <form method="GET"><br><br><br><br>
                    <input type="text" hidden name="id" value="<?php echo $q['id']; ?>" style="width:400px">
                    <h3>Title :</h3><input type="text" name="title" placeholder="Blog Title" value="<?php echo $q['title']; ?>" style="width:400px"><br>
                    <h3>Short Description :</h3><textarea name="desc" placeholder="Short description" style="width:400px ;height:80px ;"><?php echo $q['short_desc']; ?></textarea><br><br>
                    <h3>Content :</h3><textarea name="content" class="" style="width:400px ;height:130px ;"><?php echo $q['content']; ?></textarea><br><br>
                    <button name="update">Update Post</button><br><br><br><br>
                </form>

            <?php } ?>
</div>
    </div>
    </div>
</body>

</html>