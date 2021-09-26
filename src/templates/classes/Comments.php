<?php


class Comments extends Db
{

  public function dispcomment($post_id)
  {
    $sql = "SELECT * from comments WHERE post_id = $post_id  ";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }

  public function dispcommentuser($user_id)
  {
    $sql = "SELECT * from user WHERE user_id = $user_id LIMIT 1";
    $stmt = $this->connect()->query($sql);
    $row = $stmt->fetch();
    return $row;
  }

  public function viewcmtreplies($cmt_id)
  {
    $sql = "SELECT * from comment_replies WHERE comment_id = $cmt_id ORDER BY commented_on DESC";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      $data[] = $row;
    }
    return $data;
  }

  public function comment($user_id, $msg, $post_id)
  {
    $sql = "INSERT INTO comments(user_id, msg, post_id) VALUES(?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $msg, $post_id]);
    return true;
  }

  public function commentreplies($userid, $cmt_id, $reply)
  {
    $sql = "INSERT INTO comment_replies(user_id, comment_id, reply_msg) VALUES(?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$userid, $cmt_id, $reply]);
    return true;
  }
}
