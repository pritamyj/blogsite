<?php
include "db.php";


if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM data WHERE id = $id";
    $Q = mysqli_query($conn, $sql);

    if ($_SESSION['username'] == 'admin') {

        header("Location: admin.php?info=updated");
        exit();
    } else {
        header("Location: user.php?info=deleted");
        exit();
    }
}

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
        <h2> <a href="edit.php?id=<?php echo $q['id']; ?>">Edit</a></h2>
        <form method="POST">
            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
            <button name="delete">DELETE</button>

        </form>

        <?php
        if ($_SESSION['username'] == 'admin') { ?>
            <br> <a href="admin.php"> <button>Back</button></a>
        <?php } else {
        ?><a href="user.php"><button>Back</button></a><?php
                                                    } ?>
    </div>

</body>

</html>