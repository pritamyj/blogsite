<?php
$errorlevel = error_reporting();
error_reporting($errorlevel & ~E_NOTICE);
session_start();
include '../autoload.php';


if (isset($_REQUEST["update"])) {
    $id = $_REQUEST['id'];
    $file=$_FILES['imgg']; 
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $filedest="images/".$filename;
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"]; 

    if ($fileerror == 0) {

        if (move_uploaded_file($filepath, "../../$filedest")) {    

            $update = new User();
            $update->update($title, $content , $filedest, $id);

            if ($_SESSION['ty'] == 'admin') {
                header("Location: ../Admin/admin.php?info=updated");
                exit();
            } else {
                header("Location: ../User/user.php?info=updated");
                exit();
            }
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/imgdisp.js"></script>
    <title></title> 
</head>

<body>
    <?php  
    if($_SESSION['ty'] == false){  
        include "../Header/navbar.php";   
    }elseif($_SESSION['ty'] == 'admin'){ 
        include "../Header/navbar_admin.php";  
    }elseif($_SESSION['ty'] == 'user'){ 
        include "../Header/navbar_user.php";
    }  

    if ($_SESSION['username'] == 'admin') { ?>
     <a href="../Admin/admin.php"> <button>Back</button></a>
 <?php } else {
    ?><a href="../User/user.php"><button>Back</button></a><?php
}
error_reporting($errorlevel);


$id = $_REQUEST['id'];
$ui= $_SESSION['ui'];
$data = new User(); 
$query = $data->selectedposts($id, $ui);
if(!empty($query))
{
  foreach ($query as $q) { ?>

    <section class="gp">
      <h1>Edit Post</h1>
      <div class="p">
        <div class="child">
          <img src="../../<?php echo $q['images']; ?>" id="thumb" name="imgg" alt="Add image" class="img" >
      </div>
      <div class="child"> 
          <p><form method="POST" enctype="multipart/form-data" > 
            <input type="text" name="title" placeholder="Blog Title" value="<?php echo $q['title']; ?>">  
            <textarea name="content" placeholder="Blog content" style="height:185px;"><?php echo $q['content']; ?></textarea> 
            <input type="hidden" name="size" value="1000000"> 
            <input type="file" name="imgg" onchange="preview()" style="margin-bottom: 15px;"> 
            <input type="submit" name="update" value="Edit Post">
            <input type="hidden"  name="id" value="<?php echo $q['id']; ?>" > 
        </form></p>
    </div>

</div>
</section>
<?php }
}else{
   header("Location: ../User/user.php");
   exit();
} ?>
<link rel="stylesheet" type="text/css" href="../../css/view.css">
<link rel="stylesheet" type="text/css" href="../../css/create_post.css">

<?php
include "../Header/footer.php"; ?>
</body>

</html> 