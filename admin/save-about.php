<?php
include_once "config.php";

$about_title = $_POST['about_title'];
$about_description = $_POST['about_description'];
if (isset($_POST['about_id'])) {
    $about_id = $_POST['about_id'];
    $sql = " SELECT * FROM about WHERE about_id ={$about_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        if (empty($_FILES['new-image']['name'])) {
            $new_name = $_POST['old-image'];
        } else {
            $sql1 = "SELECT about_img FROM about WHERE about_id ={$about_id} ";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($result1);
            unlink("upload/about/" . $row['about_img']);
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

            $new_name = time() . "-" . basename($file_name);
            $target = "upload/about/" . $new_name;
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $target);
            } else {
                print_r($errors);
                die();
            }
        }
        $sql = "UPDATE about SET about_title ='{$about_title}',about_description='{$about_description}', about_img ='{$new_name}'
        WHERE about_id = {$about_id};";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: {$hostname}about-list.php");
        } else {
            echo "Query failed";
        }
    }
} else {
    if (!isset($_SESSION["ad_user"])) {
        header("Location:{$hostname}");
    }
    if (isset($_FILES['fileToUpload'])) {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = end(explode('.', $file_name));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = "File size must be 2mb or lower.";
        }
        $new_name = time() . "-" . basename($file_name);
        $target = "upload/about/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }
    $sql = "INSERT INTO about(about_title,about_description,about_img)
      VALUES('{$about_title}','{$about_description}','{$new_name}');";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}about-list.php");
    } else {
        echo "No Record";
    }
}
