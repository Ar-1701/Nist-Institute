<?php
include "config.php";
$carid = $_GET['carid'];
$sql = "SELECT carousel_name FROM carousel WHERE carousel_id = {$carid} ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sql4 = "DELETE FROM carousel WHERE carousel_id = {$carid}";
unlink("upload/carousel-image/" . $row['carousel_name']);
if (mysqli_query($conn, $sql4)) {
   header("Location:{$hostname}carousel-list.php");
} else {
   echo " Can't Delete Carousel. ";
}
mysqli_close($conn);
?>