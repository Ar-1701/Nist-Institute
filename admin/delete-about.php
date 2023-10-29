<?php
include_once "config.php";
$about_id = $_GET['id'];
$sql1 = "SELECT about_img FROM about WHERE about_id ={$about_id} ";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$sql = "DELETE FROM about WHERE about_id = {$about_id}";
unlink("upload/" . $row['about_img']);
if (mysqli_query($conn, $sql)) {
   header("Location:{$hostname}about-list.php");
} else {
   echo " Can't Delete User. ";
}
mysqli_close($conn);
