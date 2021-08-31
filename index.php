<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include "db.php"; 
include "navbar.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="style1.css">

    <title>home</title>
 
</head>
<body>

    <?php if($_SESSION['username'] == true){
        if ($_SESSION['ty'] == 'admin') {
            header("Location: admin.php");
            exit();
        }
        if($_SESSION['ty'] == 'user'){
            header("Location: user.php");
            exit();
        } }
        error_reporting($errorlevel);
        ?>

        <div class="bg">
            <div class="hero">
                <span class="text1">Digital Diary</span>
                <span class="text2">Blogs</span> 
            </div>
        </div>

        <section class="latest-news-area" id="latest"> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="section_title">
                        <!-- <div class="section_substitle">Blog</div> -->
                        <br>
                        <h2>Recent <strong>Blogs</strong></h2>
                    </div>
                </div> 
            </div>
            <br><br>
            <div class="row mt-3">
                <div class="news-active">  

                    <?php
                    $SQL = "SELECT * from data ORDER BY date DESC ";
                    $QUERY = mysqli_query($conn, $SQL);
                    foreach ($QUERY as $q) {
                        ?>

                        <div class="col-md-4" style="padding:20px;">
                            <div class="latest-news-wrap">
                                <div class="news-img">
                                    <img src="<?php echo $q['images']; ?>" class="img-responsive">
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
                                    <p > <?php echo $q['short_desc']; ?>...</p>

                                    <?php
                                    $un = $q['user_id'];
                                    $Sql = "SELECT * from user WHERE user_id = '$un'";
                                    $re = mysqli_query($conn, $Sql);
                                    $Que = mysqli_fetch_assoc($re);
                                    $uname = $Que['username'];
                                    ?>

                                    <p><small class="text-muted">Author: <?php echo $uname; ?></small></p> 
                                    <p></p>
                                    <div>                     
                                        <a href="show_post.php?id=<?php echo $q['id']; ?>">Read More</a>
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


