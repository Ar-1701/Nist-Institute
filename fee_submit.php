<?php
include_once 'config.php';

$username = $_POST['username'];
$registerId = $_POST['registerId'];
$semester_fee = $_POST['semester_fee'];
$other_fee = $_POST['other_fee'];
$exam_fee = $_POST['exam_fee'];
$course = $_POST['course'];
$payment = $_POST['payment'];
$Total_fee = $_POST['add'];
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d - h:i:sa");
$sql = "INSERT INTO fee(registerId,name,semesterfee,otherfee,examfee,course,payment,totalfee,date)
     VALUES('{$registerId}','{$username}','{$semester_fee}','{$other_fee}','{$exam_fee}','{$course}','{$payment}','{$Total_fee}','{$date}');";
$result = mysqli_query($conn, $sql) or die("SQL FAILED");
if ($result) {
     echo 1;
} else {
     echo 0;
}
