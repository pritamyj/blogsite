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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/indexadmin.css">
    <link rel="stylesheet" type="text/css" href="css/postcrud.css">
    <title></title>
</head>

<body>
    <?php if($_SESSION['username'] == false){

        header("Location: index.php");
        exit();
    }
    error_reporting($errorlevel);
    ?>

    <?php
    if($_SESSION['ty'] == 'admin' || $_SESSION['ty'] == false){ ?>

        <header>
            <div class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" >
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>     
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span>                        
                            </button>

                            <a href="" class="navbar-brand">LOGO</a>

                        </div>

                        <div class="collapse navbar-collapse" id="menu">
                            <ul class="nav navbar-nav">
                                <li><a href="admin.php" >HOME</a></li>
                                <li><a href="user.php">MY POST</a></li>
                                <li><a href="user_details.php">USER DETAILS</a></li>
                                <li><a href="update_details.php">DETAILS</a></li>
                                <li><a href="logout.php">LOGOUT</a></li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </header>

    <?php }else{ ?>

        <header>
            <div class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" >
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>     
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span>                        
                            </button>

                            <a href="" class="navbar-brand">LOGO</a>

                        </div>

                        <div class="collapse navbar-collapse" id="menu">
                            <ul class="nav navbar-nav">
                                <li><a href="user.php">MY POSTS</a></li>
                                <li><a href="update_details.php">DETAILS</a></li>
                                <li><a href="logout.php">LOGOUT</a></li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </header>

    <?php }
    ?>
    

    <section class="container">
        <div class="site-content">
            <div class="posts">
                <div class="post-content">
                    <div class="post-image">
                        <div class="img">
                            <img src=" #" alt="Add image" class="img" >
                        </div>
                        <div> 
                          <div class=" ">
                                <div >
                                    <form method="POST" enctype="multipart/form-data" >
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
                    </div>
                </div>
            </div>
            <aside class="sidebar"> 
            </aside> 
        </section>



    </body>

    </html>