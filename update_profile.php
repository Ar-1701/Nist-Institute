<?php
include_once "config.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
if (empty($_FILES['new-image']['name'])) {
    $new_name = $_POST['old-image'];
} else {
    $sql1 = "SELECT img FROM user WHERE id ={$id} ";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    unlink("admin/upload/user-image/" . $row['img']);
    $errors = array();
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "THIS EXTENSION IS NOT ALLOWED.<br>Please Choose JPG OR PNG File.";
    }

    if ($file_size > 2097152) {
        $errors[] = "File size is too large <br>please upload only 2mb file.";
    }

    $new_name = $username . "-" . basename($file_name);
    $target = "admin/upload/user-image/" . $new_name;
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        print_r($errors);
        die();
    }
}
$sql = "UPDATE user SET name ='{$name}',email='{$email}', username ='{$username}',img ='{$new_name}' WHERE id = {$id};";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Refresh: 0; url=profile.php");
} else {
    echo "Query failed";
}
