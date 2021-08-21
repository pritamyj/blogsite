<?php
session_start();
include "db.php";
// include "scripts.php";
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
    
    <section>
        <div id="container">
            <div id="header">
            <br><h1> MyBlog </h1>
        <h2><?php
            if ($_SESSION['username'] == true) {
                if ($_SESSION['ty'] == 'admin') {
                    echo $_SESSION['username'];
                } else {
                    echo "Welcome" . " " . $_SESSION['username'];
                }
            } else {
                header("Location: index.php");
                exit();
            }  ?> </h2>
        
        </div>
        <div id="navbar">
           <ul> <?php
            if ($_SESSION['ty'] == 'admin') { ?>
                <li><a class="" href="admin.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php } else { ?>
                <li><a class="" href="user.php">HOME</a></li>
                <li><a href="update_details.php">DETAILS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php  } ?>
        </ul>

    </div>
<div id="content" >
    <div  style="text-indent: 170px; ">
        
            <button><a href="create_post.php" , style="color: white;">
                    <h3>+ Create New Post</h3>
                </a></button>
                <br><br>
       
       


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

</div> <br> <br>

        <?php
        $userr = $_SESSION['username'];
        $Sql = "SELECT * from user WHERE username = '$userr'";
        $re = mysqli_query($conn, $Sql);
        $Que = mysqli_fetch_assoc($re);
        $uid = $Que['user_id'];



        $sql = "SELECT * from data WHERE user_id = '$uid'";
        $query = mysqli_query($conn, $sql);

         foreach ($query as $q) { ?>
                <div id="main">
                    <p class="" style="width: 18rem; ">
                            <h3 class=""><?php echo $q['title']; ?></h3><br>
                            <p><?php echo $q['short_desc']; ?>...</p><br><br>
                            <p style="color: #737878;">Posted on: <?php echo $q['date']; ?></p><br><br>
                            <button><a href="view.php?id=<?php echo $q['id']; ?>" , style="color: white;">Read More</a></button>
                       <br><br></p><br>
                </div><br>
            <?php } ?>
        </div><br> <br><br> <br><br> <br><br> <br><br> <br>
    </div>
</section>
</body>

</html>