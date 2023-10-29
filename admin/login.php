<?php
include_once "config.php";
$username = $_POST['username'];
$password  = md5($_POST['pass']);

$sql = "SELECT id,name,ad_user FROM admin WHERE ad_user ='{$username}' AND ad_pass ='{$password}'";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["admin_id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["ad_user"] = $row['ad_user'];
    }
    echo 1;
} else {
    echo 0;
}