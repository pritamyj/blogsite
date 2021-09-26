<?php
include '../autoload.php';

$id = $_GET['delid']; 
$del= new User(); 
$del->deleteuser($id); 
header("Location: user_details.php?info=deleted");
exit();
