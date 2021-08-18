<?php
include "db.php";
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
    <table class="table">
      <thead>
        <tr class="text-center">
          <th scope="col">User ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Username</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['user_id'];
          $full_name = $row['full_name'];
          $uname = $row['username'];
          // $full_name=$row['full_name'];


          echo '<tr class="text-center">
      <th scope="row">' . $id . '</th>
      <td>' . $full_name . '</td>
      <td>' . $uname . '</td>
      <td>
      <button class="btn btn-primary" ><a href="update.php?upid=' . $id . '" class="text-light">Update</a></button>
      <button class="btn btn-danger" ><a href="up_del.php?delid=' . $id . '" class="text-light">Delete</a></button>
      </td>
    </tr>';
        }

        ?>
      </tbody>
    </table>
  </div>


</body>

</html>