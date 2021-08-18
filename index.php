<?php
include "db.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <title>HOME</title>
</head>

<body>
    <section>
        <div class="">
            <div id="header" style="padding:20px;">
                <h1> MyBlog</h1>
            </div>
            <div id="navbar">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">LOGIN</a></li>
                    <li><a href="register.php">REGISTRATION</a></li>
                </ul>
            </div>

            <div id="content">
               
                    <?php
                    $SQL = "SELECT * from data ORDER BY date DESC ";
                    $QUERY = mysqli_query($conn, $SQL);
                    foreach ($QUERY as $q) {
                    ?> <div class="row-mt-4">

                        <!-- start row -->
                        <div class="col-md-4 ">
                            <div class="">
                                <div class="card ">
                                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-color:blue;"><?php echo $q['title']; ?></h5><br>
                                        <p class="card-text "><?php echo $q['short_desc']; ?>...</p>
                                        <?php
                                        $un = $q['user_id'];
                                        $Sql = "SELECT * from user WHERE user_id = '$un'";
                                        $re = mysqli_query($conn, $Sql);
                                        $Que = mysqli_fetch_assoc($re);
                                        $uname = $Que['username'];
                                        ?>
                                        <p class="card-text"><small class="text-muted">Author:<?php echo $uname; ?></small></p>
                                        <p class="card-text"><small class="text-muted">Posted on
                                                <?php echo $q['date']; ?></small></p>
                                        <a href="show_post.php?id=<?php echo $q['id']; ?>" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <!-- end row -->
                </div><?php } ?><br>
            </div>
        </div>
    </section>
</body>

</html>