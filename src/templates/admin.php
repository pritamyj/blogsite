<?php
session_start();
include "db.php";
include "navbar_admin.php";
include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/index_&_admin.css">   

    <title>home</title>

</head>
<body>

    <?php
    if ($_SESSION['username'] == true) {
        if ($_SESSION['ty'] == 'admin') {
            $n= $_SESSION['username'];
        } else {
            echo "Welcome" . " " . $_SESSION['username'];
        }
    } else {
        header("Location: index.php");
        exit();
    }  ?>

    <div class="bg_admin">
        <div class="hero">
            <span class="text1">Welcome </span>
            <span class="text2"><?php echo $n; ?></span> 
        </div>
    </div>

    <section class="latest-news-area" id="latest">

        <div class="row">
            <div class="col-sm-12">
                <div class="section_title">
                    <!-- <div class="section_substitle">Blog</div> -->
                    <br>
                    <h2>All <strong>Blogs</strong></h2>
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
            <?php }

            ?> 
        </div> 
        <div class="row mt-4">
            <div class="news-active">

                <?php
                         $datas= new Index(); 
                         $dataa = $datas->allposts(); 
                         foreach ($dataa as $q) {
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
                                <p >
                                    <?php echo $q['short_desc']; ?>...
                                </p>

                                <?php
                                        $a2= new Index(); 
                                        $a1 = $a2->usern($q['user_id']); 
                                        foreach($a1 as $u){
                                          $uname= $u['username'] ;
                                        }
                                        ?>

                                <p><small class="text-muted">Author: <?php echo $uname; ?></small></p> 
                                
                            <p></p>
                            <h5><strong style="color: blue;"><small"> <?php echo getLikes($q['id']); ?> Likes </small></strong> 

                              &nbsp;&nbsp;&nbsp;&nbsp;

                              <strong style="color: red;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?> Dislikes</span></strong> </h5>
                            <p></p>

                                <div>                     
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


