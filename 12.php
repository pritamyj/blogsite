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


<style type="text/css">
    .navbar {
    padding: 45px 0px 0px 0px;
    transition: all 0.5s ease-in-out;
    font-family: tahoma;
}

@media (max-width: 768px){
    .section-cards .card{
    display: inline-block;
    position: relative;
    width: 320px;
    /*height: 520;*/
    margin: 20px 0;
    border-radius: 6px;
    color: rgba(0, 0, 0, 0.87);
    background-color: var(--white-color);
    box-shadow: var(--card-shadow);
}
} 
</style>

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

            <!-- <a href="" class="btn">get started</a> -->
        </div>
    </div>



<header>
    <h2>Recent <strong>Blogs</strong></h2>
</header>


<section class="latest-news-area" id="latest">


    <div class="section-cards">
        <div class=" container">
            <div class="row">


                <?php 
                $SQL = "SELECT * from data ORDER BY date DESC ";
                $QUERY = mysqli_query($conn, $SQL);
                foreach ($QUERY as $q) {
                ?>


                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-image">
                            <a href="#"><img src="<?php echo $q['images']; ?>" class="img-fluid" style="width:400px;height: 200px;" ></a>

                        <div class="date">
                        <?php 
                        $dt= new DateTime($q['date']); 
                        ?>
                        <span><?php echo $dt->format('d'); ?></span>
                        <span><?php echo $dt->format('M');?></span>
                        </div>

                        </div>

                        <div class="content">
                            <h3><?php echo $q['title']; ?></h3>
                            <p > <?php echo $q['short_desc']; ?>... </p>
                                        <?php
                                        $un = $q['user_id'];
                                        $Sql = "SELECT * from user WHERE user_id = '$un'";
                                        $re = mysqli_query($conn, $Sql);
                                        $Que = mysqli_fetch_assoc($re);
                                        $uname = $Que['username'];
                                        ?>
                                <p  ><small class="text-muted">Author: <?php echo $uname; ?></small></p> 
                            <div>                     
                    <a href="show_post.php?id=<?php echo $q['id']; ?>">Read More</a>
                     </div>
                        </div>
                    </div>
                </div> 
                 <?php } ?>    

            </div>
        </div>
    </div>


</section>

</body>
</html>


