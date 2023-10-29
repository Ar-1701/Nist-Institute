<?php include_once "config.php";
$delete_id = $_GET['id'];
$sql = "DELETE cr,sub FROM course as cr
LEFT JOIN subjects as sub
ON sub.id = cr.id
WHERE cr.id= {$delete_id}";

if (mysqli_multi_query($conn, $sql)) {
    header("Location:{$hostname}course-list.php");
} else {
    echo "Query Failed";
}
