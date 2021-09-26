  <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>

  <?php if (isset($_GET['success'])) { ?>
      <p class="success"><?php echo $_GET['success']; ?></p>
  <?php } ?>

  <div class="inputBx">
      <span>Name</span>
      <?php if (isset($_GET['name'])) { ?>
          <input type="text" name="name" value="<?php echo $_GET['name']; ?>">
      <?php } else { ?>
          <input type="text" name="name">
      <?php } ?>
  </div>

  <div class="inputBx">
      <span>Username</span>
      <?php if (isset($_GET['uname'])) { ?>
          <input type="text" name="uname" value="<?php echo $_GET['uname']; ?>">
      <?php } else { ?>
          <input type="text" name="uname">
      <?php } ?>
  </div>

  <div class="inputBx">
      <span>Password</span>
      <input type="password" name="password">
  </div>

  <div class="inputBx">
      <span>Re-enter Password</span>
      <input type="password" name="re_password">
  </div><br>

  <div class="inputBx">
      <input type="submit" name=" " value="Add User">
  </div>