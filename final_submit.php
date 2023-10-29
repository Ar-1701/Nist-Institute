<?php
session_start();
include_once "config.php";
$username = $_SESSION["username"];
$stuId = $_POST['stuId'];

$sql = "SELECT stuId FROM admission WHERE stuId ={$stuId}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "YOU ARE ALREADY ADDMISSION";
    die();
} else {
    if (isset($_FILES['stuImg']) && isset($_FILES['highschool']) && isset($_FILES['interMarksheet']) && isset($_FILES['aadharcard'])) {
        $errors = array();

        $file_name1 = $_FILES['stuImg']['name'];
        $file_size1 = $_FILES['stuImg']['size'];
        $file_tmp1 = $_FILES['stuImg']['tmp_name'];

        $file_name2 = $_FILES['highschool']['name'];
        $file_size2 = $_FILES['highschool']['size'];
        $file_tmp2 = $_FILES['highschool']['tmp_name'];

        $file_name3 = $_FILES['interMarksheet']['name'];
        $file_size3 = $_FILES['interMarksheet']['size'];
        $file_tmp3 = $_FILES['interMarksheet']['tmp_name'];

        $file_name4 = $_FILES['aadharcard']['name'];
        $file_size4 = $_FILES['aadharcard']['size'];
        $file_tmp4 = $_FILES['aadharcard']['tmp_name'];

        $file_ext1 = end(explode('.', $file_name1));
        $file_ext2 = end(explode('.', $file_name2));
        $file_ext3 = end(explode('.', $file_name3));
        $file_ext4 = end(explode('.', $file_name4));
        $extensions = array("jpeg", "jpg", "png", "JPG", "JPEG", "PNG");

        if (in_array($file_ext1, $extensions) === false) {
            echo "This extension file not allowed, Please choose a JPG or PNG file.";
        } elseif (in_array($file_ext2, $extensions) === false) {
            echo "This extension file not allowed, Please choose a JPG or PNG file.";
        } elseif (in_array($file_ext3, $extensions) === false) {
            echo "This extension file not allowed, Please choose a JPG or PNG file.";
        } elseif (in_array($file_ext4, $extensions) === false) {
            echo "This extension file not allowed, Please choose a JPG or PNG file.";
        } elseif ($file_size1 > 5123000) {
            echo "File size must be 5mb or lower.";
        } elseif ($file_size2 > 5123000) {
            echo "File size must be 5mb or lower.";
        } elseif ($file_size3 > 5123000) {
            echo "File size must be 5mb or lower.";
        } elseif ($file_size4 > 5123000) {
            echo "File size must be 5mb or lower.";
        }
        $user_id = $username;
        $user_dir = 'admin/upload/addmission/' . $user_id;
        if (!file_exists($user_dir)) {
            mkdir($user_dir, 0777, true);
        } else {
            echo "Directory already exists";
        }
        $stuImg = basename($file_name1);
        $highschool = basename($file_name2);
        $interMarksheet = basename($file_name3);
        $aadharcard = basename($file_name4);

        $target1 = $user_dir . "/" .  $stuImg;
        $target2 = $user_dir . "/" .  $highschool;
        $target3 = $user_dir . "/" .  $interMarksheet;
        $target4 = $user_dir . "/" .  $aadharcard;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp1, $target1);
            move_uploaded_file($file_tmp2, $target2);
            move_uploaded_file($file_tmp3, $target3);
            move_uploaded_file($file_tmp4, $target4);
        } else {
            print_r($errors);
            die();
        }
    }

    if (isset($_POST['byCard'])) {
        $payment = "By Card";
    }
    if (isset($_POST['phonePe'])) {
        $payment = "By PhonePe";
    }
    if (isset($_POST['upiId'])) {
        $payment = "By UPI";
    }

    $stuName = $_POST['firstName'] . " " . $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $fatherFirstName = $_POST['fatherFirstName'] . " " . $_POST['fatherLastName'];
    $motherFirstName = $_POST['motherFirstName'] . " " . $_POST['motherLastName'];
    $fatherOccupation = $_POST['fatherOccupation'];
    $fatherNumber = $_POST['fatherNumber'];
    $perAddress = $_POST['perAddress'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    // Form -2
    $percent12 = $_POST['percent12'] . "%";
    $yearOfPass = $_POST['yearOfPass'];

    $add_fee = $_POST['add_fees'];
    $other_fee = $_POST['otherfee'];
    $semester_fee = $_POST['fees'];
    $course = $_POST['course'];
    $Total_fee = $_POST['totalFee'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d - h:i:sa");
    $sql3 = "INSERT INTO addmission_billing(registerId,name,semesterfee,add_fees,otherfee,course,payment,totalfee,date)
     VALUES('{$stuId}','{$stuName}','{$semester_fee}','{$add_fee}','{$other_fee}','{$course}','{$payment}','{$Total_fee}','{$date}');";

    $sql = "INSERT INTO admission(stuId,stu_name,stu_fname,stu_mname,stu_dob,stu_gender,number,parentNumber,stu_email,course,perAddress,address2,city,state,pincode,percent,yearOfPass,stuImg,highschool,interMarksheet,aadharcard,payment)
     VALUES('{$stuId}','{$stuName}','{$fatherFirstName}','{$motherFirstName}','{$dob}','{$gender}','{$mobile}','{$fatherNumber}','{$email}','{$course}',
     '{$perAddress}','{$address2}','{$city}','{$state}','{$pincode}','{$percent12}','{$yearOfPass}','{$stuImg}','{$highschool}','{$interMarksheet}','{$aadharcard}','{$payment}');";
    $result = mysqli_query($conn, $sql) or die("SQL FAILED");
    $result1 = mysqli_query($conn, $sql3) or die("SQL FAILED");
    if ($result && $result1) {
        $sql1 = "SELECT course.id,course.seat,admission.stuId,admission.course FROM admission	
					JOIN course
					ON admission.course = course.id
                    WHERE stuId = '{$stuId}'";
        $result11 = mysqli_query($conn, $sql1);
        if ($q = mysqli_num_rows($result11) > 0) {
            while ($row1 = mysqli_fetch_assoc($result11)) {
                $update_seat =  $row1['seat'] - $q;
            }
            $sql2 = "UPDATE course SET seat ={$update_seat} WHERE id ={$course}";
            $result12 = mysqli_query($conn, $sql2);
            if ($result12) {
                header("Location:{$hostname}add_receipt.php");
            }
        } else {
            echo "not Update seat";
        }
    } else {
        echo "Insert Failed";
    }
}
