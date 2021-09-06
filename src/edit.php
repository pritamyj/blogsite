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
    <title></title> 
</head>

<body>
    <?php if($_SESSION['ty'] == false){

    header("Location: index.php");
    exit();
  }

  if($_SESSION['ty'] == false){  
    include "navbar.php";   
  }elseif($_SESSION['ty'] == 'admin'){
    include "navbar_admin.php"; 
  } else{ 
    include "navbar_user.php"; }

        if ($_SESSION['username'] == 'admin') { ?>
             <a href="admin.php"> <button>Back</button></a>
        <?php } else {
        ?><a href="user.php"><button>Back</button></a><?php
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
          <p><form method="POST" enctype="multipart/form-data" >
            <!-- <h3>Title :</h3> -->
            <input type="text" name="title" placeholder="Blog Title" value="<?php echo $q['title']; ?>"> 
            <!-- <h3>Short Description :</h3> -->
            <textarea name="desc" placeholder="Short description"  style=" height:80px;"><?php echo $q['short_desc']; ?></textarea>
            <!-- <h3>Content :</h3> -->
            <textarea name="content" placeholder="Blog content" style="height:130px;"><?php echo $q['content']; ?></textarea> 
            <input type="hidden" name="size" value="1000000"> 
            <input type="file" name="imgg"style="margin-bottom: 15px;"> 
            <input type="submit" name="update" value="Edit Post">
            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>" >
            <!-- <button name="update">Add Post</button> -->
          </form></p>
        </div>
        <div class="child">
          <img src="<?php echo $q['images']; ?>" alt="Add image" class="img" >
        </div>

      </div>
    </section>
<?php }
            }else{
           header("Location: user.php");
        exit();
        } ?>
    <link rel="stylesheet" type="text/css" href="css/view.css">
    <link rel="stylesheet" type="text/css" href="css/create_post.css">
  </body>

  </html> 