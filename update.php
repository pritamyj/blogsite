<?php
include "db.php";

if (isset($_POST['done'])) {
  $id = $_GET['upid'];
  $fn = $_POST['full_name'];
  $un = $_POST["username"];
  $pass = $_POST["password"];
  $sql = "UPDATE user SET full_name='$fn', username='$un', password='$pass', WHERE user_id=$id";
  mysqli_query($conn, $sql);
  header("Location: user_details.php?info=updated");
  exit();
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>CRUD</title>
</head>

<body>
  <div class="container">
    <form>

      <!-- <div class="mb-3">
    <label  class="form-label">User</label>
    <input type="full_name" class="form-control" >
  </div> -->
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="full_name" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary" name="done">Submit</button>
    </form>
  </div>


</body>

</html>