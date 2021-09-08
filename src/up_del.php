<?php
include 'includes/db.inc.php';

$id = $_GET['delid'];
// $sql = "DELETE FROM `user` WHERE user_id= $id";
// $Q = mysqli_query($conn, $sql);
$del= new User(); 
$del->deleteuser($id); 
header("Location: user_details.php?info=deleted");
exit();
?>