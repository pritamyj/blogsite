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
    <title>All blog</title>
</head>

<body>
    <div class="center">
        <div class="">

            <?php foreach ($Query as $q) { ?>

                <div>
                    <h1><?php echo $q['title'] ?></h1>

                </div>
                <p><?php echo $q['content'] ?></p><br>
                <p>Posted on:<?php echo $q['date'] ?></p>
                <?php $un = $q['user_id'];
                $Sql = "SELECT * from user WHERE user_id = '$un'";
                $re = mysqli_query($conn, $Sql);
                $Que = mysqli_fetch_assoc($re);
                $uname = $Que['username'];
                ?>
                <p>Author:<?php echo $uname; ?></p>
            <?php } ?>
        </div>
    </div>

    <br> <a href="index.php"> <button>Back</button></a>
</body>

</html>