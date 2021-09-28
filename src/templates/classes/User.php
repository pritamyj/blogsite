<?php

class User extends Db
{

  public function userposts($ui)
  {

    $sql = "SELECT * FROM data WHERE user_id=$ui";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectedpostuser($id, $ui)
  {

    $sql = "SELECT * FROM data WHERE id = $id AND user_id=$ui";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }

  public function selectedposts($title)
  {

    $sql = "SELECT * FROM data WHERE title = '$title'";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }

  public function insert($title, $content, $uid, $filedest)
  {

    $sql = "INSERT INTO data(title, content, user_id , images) VALUES(?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $content, $uid, $filedest]);
  }

  public function update($title, $content, $filedest, $uid)
  {

    $sql = "UPDATE data SET title=?, content=? , images=? WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $content, $filedest, $uid]);
  }

  public function delete($id)
  {

    $sql = "DELETE FROM data WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  public function upd_mydetails($uname, $pass, $name, $uid)
  {
    $sql = "UPDATE user SET username=?, password=?, full_name=? WHERE user_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uname, $pass, $name, $uid]);
  }

  public function deleteuser($uid)
  {

    $sql = "DELETE FROM data WHERE user_id=?";
    $sql2 = "DELETE FROM user WHERE user_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid]);
    $stmt2 = $this->connect()->prepare($sql2);
    $stmt2->execute([$uid]);
  }

  public function showalluser()
  {

    $sql = "SELECT * FROM user";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }
}
