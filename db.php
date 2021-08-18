<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);

$conn = mysqli_connect('localhost', 'root', '', 'blog');
if (!$conn) {
    echo "<h3>Not able to established Database Connection</h3>";
}



if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM data WHERE id = $id";
    $Query = mysqli_query($conn, $sql);
}



error_reporting($errorlevel);
?>