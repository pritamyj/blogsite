<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <title>User blog</title>
</head>

<body>
    <div class="navbar">

        <h1> MyBlog </h1>
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
        <ul>
            <?php
            if ($_SESSION['username'] == 'admin') { ?>
                <li><a class="" href="admin.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php } else { ?>
                <li><a class="" href="user.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php  } ?>
        </ul>

    </div>

    <div class="welc">
        <ul>
            <li> <a href="create_post.php" class="">
                    <h3>+ Create New Post</h3>
                </a>
        </ul>
        </ol>

    </div>


    <div class="">
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
        $userr = $_SESSION['username'];
        $Sql = "SELECT * from user WHERE username = '$userr'";
        $re = mysqli_query($conn, $Sql);
        $Que = mysqli_fetch_assoc($re);
        $uid = $Que['user_id'];



        $sql = "SELECT * from data WHERE user_id = '$uid'";
        $query = mysqli_query($conn, $sql);

        ?>


        <div class="">
            <?php foreach ($query as $q) { ?>
                <div class="">
                    <div class="">
                        <div class="" style="width: 18rem;">
                            <h3 class=""><?php echo $q['title']; ?></h3>
                            <p><?php echo $q['short_desc']; ?>...</p>
                            <p>Posted on:<?php echo $q['date']; ?></p>
                            <a href="view.php?id=<?php echo $q['id']; ?>" , class="">Read More<span>&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>