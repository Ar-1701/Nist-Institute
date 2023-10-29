<?php
include_once "config.php";
$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_message = $_POST['message'];

$sql = "INSERT INTO contact(contact_name,contact_email,contact_message)
                    VALUES('{$contact_name}','{$contact_email}','{$contact_message}')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 1;
} else {
    echo 0;
}
