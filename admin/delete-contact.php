<?php
include_once 'config.php';
$contact_id = $_GET["id"];

/*sql to delete a record*/
$sql = "DELETE FROM contact WHERE contact_id ='{$contact_id}'";

if (mysqli_query($conn, $sql)) {
  header("location:{$hostname}contact.php");
}

mysqli_close($conn);
