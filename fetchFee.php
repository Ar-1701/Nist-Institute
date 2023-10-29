<?php include_once "config.php";
$fee = $_POST['fee'];

$sql = "SELECT * FROM course WHERE id ={$fee}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['fees'] . ',';
        echo $row['examfee'] . ',';
        echo $row['otherfee'] . ',';
        echo $row['add_fees'];
    }
}
