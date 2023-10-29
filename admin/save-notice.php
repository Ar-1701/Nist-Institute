<?php
include_once "config.php";
$post_title = $_POST['post_title'];
$postdesc = $_POST['postdesc'];
$category = $_POST['category'];
$date = date("d M, Y");
if (isset($_POST['notice_id'])) {
  $notice_id = $_POST['notice_id'];
  $old_category = $_POST['old_category'];
  $sql = " SELECT * FROM notice LEFT JOIN category
  ON notice.category = category.category_id";
  $result = mysqli_query($conn, $sql) or die("Query Failed.");
  if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE notice SET notice_title='{$post_title}', description='{$postdesc}',notice_date='{$date}',category = {$category}
        WHERE notice_id = {$notice_id};";

    if ($old_category != $category) {
      $sql .= "UPDATE category SET post = post - 1  WHERE category_id = {$old_category};";
      $sql .= "UPDATE category SET post = post + 1  WHERE category_id = {$category};";
    }
    $result = mysqli_multi_query($conn, $sql);
  }
} else {
  $sql = "INSERT INTO notice(notice_title,description,notice_date,category)
        VALUES('{$post_title}','{$postdesc}','{$date}','{$category}');";

  $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";
  mysqli_multi_query($conn, $sql);
}
