<?php
include "db.php";

$id = $_GET['delid'];
$sql = "DELETE FROM `user` WHERE user_id= $id";
$Q = mysqli_query($conn, $sql);
echo $sql;
header("Location: user_details.php?info=deleted");
exit();
?>