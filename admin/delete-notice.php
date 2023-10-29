<?php
include_once "config.php";
$notice_id = $_GET['id'];
$cat_id = $_GET['cat_id'];
$sql = "DELETE FROM notice WHERE notice_id = {$notice_id};";
$sql .= "UPDATE category SET post = post - 1  WHERE category_id = {$cat_id};";
if (mysqli_multi_query($conn, $sql)) {
   header("Location:{$hostname}notice.php");
} else {
   echo " Can't Delete Notice. ";
}
mysqli_close($conn);
