<?php
include_once "config.php";
$teacher_id = $_GET['id'];
$teacher_name = $_GET['name'];

$parent_folder = "upload"; // Replace with the name of the parent folder
$child_folder = "teacher/" . $teacher_name; // Replace with the name of the child folder

// Check if the parent folder exists and if the user has permission to delete the child folder
if (file_exists($parent_folder) && is_dir($parent_folder) && is_writable($parent_folder)) {
  $child_folder_path = $parent_folder . "/" . $child_folder;
  // Check if the child folder exists and if the user has permission to delete it
  if (file_exists($child_folder_path) && is_dir($child_folder_path) && is_writable($child_folder_path)) {
    // Delete any files inside the child folder
    $files = glob($child_folder_path . '/*');
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
    // Delete the child folder
    if (rmdir($child_folder_path)) {
      $sql = "DELETE FROM teacher_profile WHERE userId ={$teacher_id}";
      if (mysqli_query($conn, $sql)) {
        header("location:{$hostname}teacher-list.php");
      }
      mysqli_close($conn);
    } else {
      echo "Error deleting child folder.";
    }
  } else {
    echo "Child folder does not exist or user does not have permission to delete it.";
  }
} else {
  echo "Parent folder does not exist or user does not have permission to delete the child folder.";
}
