<?php
include "db.php";

if (isset($_REQUEST["update"])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];
    $desc = $_REQUEST["desc"];
    $sql = "UPDATE data SET title='$title', content='$content', short_desc='$desc' WHERE id=$id";
    mysqli_query($conn, $sql);

    if ($_SESSION['username'] == 'admin') {
        header("Location: admin.php?info=updated");
        exit();
    } else {
        header("Location: user.php?info=updated");
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
    <title></title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>

<body>

    <div class="center">
        <div class="">

            <?php foreach ($Query as $q) { ?>
                <form method="GET">
                    <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                    <input type="text" name="title" placeholder="Blog Title" value="<?php echo $q['title']; ?>"><br><br>
                    <textarea name="desc" placeholder="Short description"><?php echo $q['short_desc']; ?></textarea><br><br>
                    <textarea name="content" class=""><?php echo $q['content']; ?></textarea>
                    <button name="update">Update Post</button>
                </form>

            <?php } ?>


        </div>
    </div>

</body>

</html>