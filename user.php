<?php
session_start();
include "db.php";
include "navbar_admin.php";
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css"> 

    <title>User blog</title>

</head>
<body>

    <?php
    if ($_SESSION['username'] == true) {
        if ($_SESSION['ty'] == 'admin') {
            $n= $_SESSION['username'];

        } else {
         $n= $_SESSION['username'];
     }
 } else {
    header("Location: index.php");
    exit();
}  ?>

<div class="bg_admin">
    <div class="hero">

        <?php
        if ($_SESSION['username'] == true) {
            $n= $_SESSION['username'];
            if ($_SESSION['ty'] == 'admin') {
                ?>
                <span class="text1">My Blogs</span>

                <?php

            }else {
                ?>
                <span class="text1">Welcome </span>
                <span class="text2"><?php echo $n; ?></span>
                <?php
            }

        } else {
            header("Location: index.php");
            exit();
        }  ?>
        <a href="create_post.php" class="btn">+ Create New Post</a>
    </div>
</div>

<section class="latest-news-area" id="latest">
    <div class="row">
        <div class="col-sm-12">
            <div class="section_title"> <br>

                <?php
                if ($_SESSION['ty'] == 'admin') {
                    ?>
                    <h2><strong>Blogs</strong></h2>
                    <?php

                }else {
                    ?>
                    <h2>All <strong>Blogs</strong></h2>
                <?php } ?>
                
            </div>
        </div> 
    </div>
    <br><br> 
    <div  style="text-indent: 170px; ">

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
        <?php } ?> 
    </div>

    <div class="row mt-4">
        <div class="news-active">

            <?php
            $userr = $_SESSION['username'];
            $Sql = "SELECT * from user WHERE username = '$userr'";
            $re = mysqli_query($conn, $Sql);
            $Que = mysqli_fetch_assoc($re);
            $uid = $Que['user_id'];

            $sql = "SELECT * from data WHERE user_id = '$uid'";
            $query = mysqli_query($conn, $sql);

            foreach ($query as $q) { ?> 
                
                <div class="col-md-4" style="padding:20px;">
                    <div class="latest-news-wrap">
                        <div class="news-img">
                            <img src="<?php echo $q['images']; ?>" class="img-responsive" style="width: 100% height: 100%;">
                            <div class="date">
                                <?php 
                                $dt= new DateTime($q['date']);

                                ?>
                                <span><?php echo $dt->format('d'); ?></span>
                                <span><?php echo $dt->format('M');?></span>
                            </div>
                        </div> 
                        <div class="news-content"> 
                            <h3><?php echo $q['title']; ?></h3>
                            <p > <?php echo $q['short_desc']; ?>... </p>
                            <a href="view.php?id=<?php echo $q['id']; ?>">Read More</a> 
                        </div> 
                    </div>
                </div> 
            </div>
            <?php } ?><br> 
        </div>
    </div> 
</section> 

</body>
</html>


