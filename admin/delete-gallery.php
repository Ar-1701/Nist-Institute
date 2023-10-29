<?php
include_once "config.php";
$galid = $_GET['galid'];
$sql = "SELECT * FROM gallery WHERE gal_id = {$galid} ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sql4 = "DELETE FROM gallery WHERE gal_id = {$galid}";
unlink("upload/gallery/" . $row['gal_title']);
if (mysqli_query($conn, $sql4)) {
   header("Location:{$hostname}gallery-list.php");
} else {
   echo " Can't Delete Carousel. ";
}
mysqli_close($conn);
