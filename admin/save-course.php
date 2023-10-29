<?php
include_once "config.php";
$course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
$fees = mysqli_real_escape_string($conn, $_POST['fees']);
$add_fees = mysqli_real_escape_string($conn, $_POST['add_fees']);
$exam_fees = mysqli_real_escape_string($conn, $_POST['exam_fees']);
$other_fees = mysqli_real_escape_string($conn, $_POST['other_fees']);
$seat = mysqli_real_escape_string($conn, $_POST['seat']);
$course_eligible = mysqli_real_escape_string($conn, $_POST['course_eligible']);
$course_sly = mysqli_real_escape_string($conn, $_POST['course_sly']);
$course_duration = mysqli_real_escape_string($conn, $_POST['course_duration']);
$objective = mysqli_real_escape_string($conn, $_POST['objective']);
if (isset($_POST["course_id"])) {
    $course_id = $_POST["course_id"];
    $sql = "SELECT * FROM course
                 LEFT JOIN subjects
                 ON course.id = subjects.id";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE course SET course_name='{$course_name}',fees='{$fees}',add_fees='{$add_fees}',examfee='{$exam_fees}',otherfee='{$other_fees}',seat='{$seat}' WHERE id = {$course_id};";
        $sql .= "UPDATE subjects SET eligible='{$course_eligible}',syllabus='{$course_sly}',about='{$course_duration}',objective='{$objective}' WHERE id = {$course_id};";
        $result = mysqli_multi_query($conn, $sql);
    }
} else {
    $sql = "INSERT INTO course(course_name,fees,add_fees,examfee,otherfee,seat) VALUES('{$course_name}','{$fees}','{$add_fees}','{$exam_fees}','{$other_fees}','{$seat}');";
    $sql .= "INSERT INTO subjects(eligible,syllabus,about,objective)
         VALUES('{$course_eligible}','{$course_sly}','{$course_duration}','{$objective}');";

    $result = mysqli_multi_query($conn, $sql) or die("QUERY FALIED");
}
