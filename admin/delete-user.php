<?php
include_once "config.php";
$user_id = $_GET['id'];
$sql1 = "SELECT img FROM user WHERE id ={$user_id} ";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$sql = "DELETE FROM user WHERE id = {$user_id}";
unlink("upload/user-image/" . $row['img']);
if (mysqli_query($conn, $sql)) {
   header("Location:{$hostname}user.php");
} else {
   echo " Can't Delete User. ";
}
mysqli_close($conn);
