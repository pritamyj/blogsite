<?php

include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>ADMIN HOME</title>
</head>

<body>
    <div id="container">

        <div id="header">
            <h1> MyBlog</h1>
            <?php
            if ($_SESSION['username'] == true) {
                if ($_SESSION['username'] == 'admin') {?>
                <h2><?php
                    echo "My blog";?></h2><?php
                } else {
                    echo "Welcome" . " " . $_SESSION['username'];
                }
            } else {
                header("Location: index.php");
                exit();
            }  ?> 
        </div>

        <div id="navbar">
            <ul>
                <li><a class="active" href="admin.php">HOME</a></li>
                <li><a class="active" href="user.php">MY POST</a></li>
                <li><a href="user_details.php">USER DETAILS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>
        <div id="content">


            <?php if (isset($_REQUEST["info"])) {
            ?>
                <?php if ($_REQUEST["info"] == "added") { ?>
                    <div class="alert alert-sucess" role="alert">
                        <h3>Post has been added successfully</h3>
                    </div>
                <?php } else if ($_REQUEST["info"] == "updated") { ?>
                    <div class="alert alert-sucess" role="alert">
                        <h3> Post has been updated successfully</h3>
                    </div>
                <?php } else if ($_REQUEST["info"] == "deleted") { ?>
                    <div class="alert alert-danger" role="alert">
                        <h3>Post has been deleted successfully</h3>
                    </div>
                <?php } ?>
            <?php }

            ?>



            <?php


            $SQL = "SELECT * from data ORDER BY date DESC ";
            $QUERY = mysqli_query($conn, $SQL);


            foreach ($QUERY as $q) { ?>


                <div id="main">
                    <p class="" style="width: 18rem;">
                    <h3><?php echo $q['title']; ?></h3>
                    <p class=""><?php echo $q['short_desc']; ?>...</p>
                    <p>Posted on:<?php echo $q['date']; ?></p>
                    <?php
                    $un = $q['user_id'];
                    $Sql = "SELECT * from user WHERE user_id = '$un'";
                    $re = mysqli_query($conn, $Sql);
                    $Que = mysqli_fetch_assoc($re);
                    $uname = $Que['username'];
                    ?>
                    <p>Author:<?php echo $uname; ?></p>
                    <a href="view.php?id=<?php echo $q['id']; ?>" , class="">Read More<span>&rarr;</span></a><br><br>
                    </p>
                </div><br>

            <?php } ?>

        </div>

    </div>
</body>

</html>