<?php
include_once 'config.php';
if (isset($_FILES['user_image'])) {
    $errors = array();

    $file_name = $_FILES['user_image']['name'];
    $file_size = $_FILES['user_image']['size'];
    $file_tmp = $_FILES['user_image']['tmp_name'];
    $file_type = $_FILES['user_image']['type'];
    $file_ext = end(explode('.', $file_name));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time() . "-" . basename($file_name);
    $target = "admin/upload/user-image/" . $new_name;

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        print_r($errors);
        die();
    }
}
$name = mysqli_real_escape_string($conn, $_POST['name']);
$username = mysqli_real_escape_string($conn, $_POST['user']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$conpass = md5($_POST['conpass']);
$usertype = $_POST['usertype'];

$sql = "INSERT INTO user(name,email,username,password,img,usertype)
    VALUES('{$name}','{$email}','{$username}','{$conpass}','{$new_name}',{$usertype});";

$result = mysqli_query($conn, $sql) or die("Query Failed");
if ($result) {
    header("Location:{$hostname}login.php");
} else {
    echo "Failed";
}
