<?php
include_once 'config.php';
$userId = $_POST['u'];
$sql1 = "SELECT approval FROM teacher_profile WHERE userId = {$userId}";
$result1 = mysqli_query($conn, $sql1) or die("SQL FAILED");
if (mysqli_num_rows($result1) > 0) {
    $row = mysqli_fetch_assoc($result1);
    $row['approval'];
    if ($row['approval'] == 1) {
        $sql1 = 0;
        $sql = "UPDATE teacher_profile SET approval={$sql1} WHERE userId = {$userId}";
    } else {
        $sql1 = 1;
        $sql = "UPDATE teacher_profile SET approval={$sql1} WHERE userId = {$userId}";
    }
}
$result = mysqli_query($conn, $sql) or die("SQL FAILED");
if ($result) {
    echo "Success";
} else {
    echo "failed";
}
