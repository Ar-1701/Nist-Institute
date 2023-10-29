<?php
include_once "config.php";
$username = $_POST['username'];
$password  = md5($_POST['pass']);

$sql = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["username"] = $row['name'];
        $_SESSION["usertype"] = $row['usertype'];
        $_SESSION["user_img"] = $row['img'];
    }
    echo "done";
} else {
    echo "notdone";
}
