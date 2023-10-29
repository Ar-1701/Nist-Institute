<?php
session_start();
include_once 'config.php';
$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$num = $_POST['number'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];

$sub = implode(',', $_POST['sub']);
$user_dir = 'admin/upload/teacher/' . $username;
$sql1 = "SELECT approval,graduation_degree,resume,adharcard FROM teacher_profile WHERE userId = {$userId}";
$result3 = mysqli_query($conn, $sql1) or die("SQL FAILED");
if (mysqli_num_rows($result3) > 0) {
    $row1 = mysqli_fetch_assoc($result3);
    if ($row1['approval'] == 1) {
        if (empty($_FILES['new-degree']['name'])) {
            $degree = $_POST['old-degree'];
        } else {
            unlink("admin/upload/teacher/" . $username . "/" . $row1['graduation_degree']);
            $errors = array();

            $file_name1 = $_FILES['new-degree']['name'];
            $file_size1 = $_FILES['new-degree']['size'];
            $file_tmp1 = $_FILES['new-degree']['tmp_name'];


            $file_ext1 = end(explode('.', $file_name1));
            $extensions = array("jpeg", "jpg", "webp");

            if ((in_array($file_ext1, $extensions) === false)) {
                $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }

            if (($file_size1 > 5097152)) {
                $errors[] = "File size must be 5mb or lower.";
            }

            $degree = basename($file_name1);

            $target1 = $user_dir . "/" .  $degree;

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp1, $target1);
            } else {
                print_r($errors);
                die();
            }
        }
        if (empty($_FILES['new-resume']['name'])) {
            $resume = $_POST['old-resume'];
        } else {
            unlink("admin/upload/teacher/" . $username . "/" . $row1['resume']);
            $errors = array();

            $file_name2 = $_FILES['new-resume']['name'];
            $file_size2 = $_FILES['new-resume']['size'];
            $file_tmp2 = $_FILES['new-resume']['tmp_name'];

            $file_ext2 = end(explode('.', $file_name2));
            $extensions = array("jpeg", "jpg", "webp");

            if ((in_array($file_ext2, $extensions) === false)) {
                $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }

            if (($file_size2 > 5097152)) {
                $errors[] = "File size must be 5mb or lower.";
            }
            $resume = basename($file_name2);

            $target2 = $user_dir . "/" .  $resume;

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp2, $target2);
            } else {
                print_r($errors);
                die();
            }
        }
        if (empty($_FILES['new-adharcard']['name'])) {
            $adharcard = $_POST['old-adharcard'];
        } else {
            unlink("admin/upload/teacher/" . $username . "/" . $row1['adharcard']);
            $errors = array();

            $file_name3 = $_FILES['new-adharcard']['name'];
            $file_size3 = $_FILES['new-adharcard']['size'];
            $file_tmp3 = $_FILES['new-adharcard']['tmp_name'];

            $file_ext3 = end(explode('.', $file_name3));
            $extensions = array("jpeg", "jpg", "webp");

            if ((in_array($file_ext3, $extensions) === false)) {
                $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
            }

            if (($file_size3 > 5097152)) {
                $errors[] = "File size must be 5mb or lower.";
            }
            $adharcard = basename($file_name3);

            $target3 = $user_dir . "/" .  $adharcard;

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp3, $target3);
            } else {
                print_r($errors);
                die();
            }
        }
        $update = "UPDATE teacher_profile SET number ='{$num}',address1='{$address1}',address2 ='{$address2}',city ='{$city}',state ='{$state}',
            pincode ={$pincode},tutoring_sub ='{$sub}',graduation_degree='{$degree}',resume='{$resume}',adharcard='{$adharcard}' WHERE userId = {$userId};";

        $result1 = mysqli_query($conn, $update) or die("SQL FAILED");
        if ($result1) {
            header("Refresh:0; url=profile.php");
        } else {
            echo "Update failed";
        }
    }
} else {
    if (isset($_FILES['degree']) && isset($_FILES['resume']) && isset($_FILES['adharcard'])) {
        $errors = array();

        $file_name1 = $_FILES['degree']['name'];
        $file_size1 = $_FILES['degree']['size'];
        $file_tmp1 = $_FILES['degree']['tmp_name'];

        $file_name2 = $_FILES['resume']['name'];
        $file_size2 = $_FILES['resume']['size'];
        $file_tmp2 = $_FILES['resume']['tmp_name'];

        $file_name3 = $_FILES['adharcard']['name'];
        $file_size3 = $_FILES['adharcard']['size'];
        $file_tmp3 = $_FILES['adharcard']['tmp_name'];

        $file_ext1 = end(explode('.', $file_name1));
        $file_ext2 = end(explode('.', $file_name2));
        $file_ext3 = end(explode('.', $file_name3));

        $extensions = array("jpeg", "jpg", "png");

        if ((in_array($file_ext1, $extensions) === false) && (in_array($file_ext2, $extensions) === false) && (in_array($file_ext3, $extensions) === false)) {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
        }

        if (($file_size1 > 5097152) && ($file_size2 > 5097152) && ($file_size3 > 5097152)) {
            $errors[] = "File size must be 2mb or lower.";
        }
        if (!file_exists($user_dir)) {
            mkdir($user_dir, 0777, true);
        } else {
            echo "Directory already exists";
        }
        $degree =  basename($file_name1);
        $resume =  basename($file_name2);
        $adharcard =  basename($file_name3);

        $target1 = $user_dir . "/" .  $degree;
        $target2 = $user_dir . "/" .  $resume;
        $target3 = $user_dir . "/" .  $adharcard;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp1, $target1);
            move_uploaded_file($file_tmp2, $target2);
            move_uploaded_file($file_tmp3, $target3);
        } else {
            print_r($errors);
            die();
        }
        $sql = "INSERT INTO teacher_profile(userId,number,address1,address2,city,state,pincode,tutoring_sub,graduation_degree,resume,adharcard)
            VALUES({$userId},'{$num}','{$address1}','{$address2}','{$city}','{$state}','{$pincode}','{$sub}','{$degree}','{$resume}','{$adharcard}');";

        $result = mysqli_query($conn, $sql) or die("SQL FAILED");
        if ($result) {
            echo "Insert Success";
            header("Location:{$hostname}profile.php");
        } else {
            echo "Insert Failed";
        }
    }
}
