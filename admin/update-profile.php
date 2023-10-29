<?php
session_start();
include_once "config.php";
if (isset($_POST['submit'])) {
    $error = array();
    $name = $_POST["name"];
    $user = $_POST["username"];
    $old_pass = $_POST["old_pass"];
    $new_pass = $_POST["pass"];

    $sql = "SELECT * FROM admin WHERE id = {$_SESSION['admin_id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($old_pass == $row['ad_pass']) {
        $error[] = "Hello";
        if ($new_pass = "") {
            $error[] = "Please Fill Password";
        }
        if ($new_pass != $con_password) {
            $error[] = "Confirm Password Not Match";
        }
    } else {
        $new_pass = md5($_POST['pass']);
        echo $sql1 = "UPDATE admin SET name = '{$name}',ad_user='{$user}', ad_pass = '{$new_pass}' WHERE id = {$_SESSION['user_id']}";

        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            header("Location:{$hostname}dashboard.php");
            echo "Update Password";
        } else {
            $error[] = "Not Update";
        }
    }
} else {
    echo "Not";
}
