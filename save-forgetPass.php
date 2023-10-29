<?php
include_once 'config.php';
$email = $_POST['email'];
$old_pass = md5($_POST['old_pass']);
$new_pass = md5($_POST['new_pass']);

$sql = "SELECT email,password FROM user WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($email == $row['email']) {
        if ($old_pass == $row['password']) {
            echo "error";
        } else {
            $sql = "UPDATE user SET password ='{$new_pass}' WHERE email = '{$email}'";
            if (mysqli_query($conn, $sql)) {
                echo "done";
            }
        }
    } else {
        echo 'email_error';
    }
} else {
    echo 'Not_match';
}
