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
    <title>User blog</title>
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

            <?php foreach ($Query as $q) {



             ?>
<br> <br><br> <br>

                <div class="contain">
                    <h1><?php echo $q['title'] ?></h1>

                <br>
                <p><?php echo $q['content'] ?></p><br><br>
                <p>Posted on: <?php echo $q['date'] ?></p><br>
                <?php $un = $q['user_id'];
                $Sql = "SELECT * from user WHERE user_id = '$un'";
                $re = mysqli_query($conn, $Sql);
                $Que = mysqli_fetch_assoc($re);
                $uname = $Que['username'];
                ?>
                <p>Author: <?php echo $uname; ?></p>
            <?php } ?>
         </div><br> <br>
        <div style="text-indent: 20px; ">
        <form method="POST">
            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>" >
            <button name="delete">DELETE</button>
<button> <a href="edit.php?id=<?php echo $q['id']; ?>", style="color: white;">EDIT</a></button>
        </form></div>
<br> <br>
      <br> <br>  
    </div>
</body>

</html>