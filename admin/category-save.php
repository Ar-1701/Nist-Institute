<?php
include_once "config.php";
// Update Query
if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
    $category = $_POST['cat_name'];
    $sql = "SELECT * FROM category WHERE category_id ={$cat_id}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql1 = "UPDATE category SET category_name='{$category}' WHERE category_id=$cat_id";
        if (mysqli_query($conn, $sql1)) {
            header("location: {$hostname}category.php");
        }
    }
    // Insert Query
} else {
    $category_name = $_POST['cat_save'];
    $sql = "INSERT INTO category(category_name) VALUE('{$category_name}')";
    mysqli_query($conn, $sql);
    header("location: {$hostname}category.php");
}
