<?php
include_once 'config.php';
$user_id = $_GET["id"];
$table = $_GET["table"];
$baseName = $_GET["baseName"];
/*sql to delete a record*/
$sql = "DELETE FROM $table WHERE id ={$user_id}";
if (mysqli_query($conn, $sql)) {
  header("location:{$hostname}$baseName.php");
}
mysqli_close($conn);
