<?php session_start();
include_once "config.php";
$stu_id = $_GET['id'];
$stu_name = $_GET['name'];

$parent_folder = "upload";
$child_folder = "addmission/" . $stu_name;

if (file_exists($parent_folder) && is_dir($parent_folder) && is_writable($parent_folder)) {
   $child_folder_path = $parent_folder . "/" . $child_folder;
   if (file_exists($child_folder_path) && is_dir($child_folder_path) && is_writable($child_folder_path)) {
      $files = glob($child_folder_path . '/*');
      foreach ($files as $file) {
         if (is_file($file)) {
            unlink($file);
         }
      }
      // Delete the child folder
      if (rmdir($child_folder_path)) {
         $sql = "DELETE FROM admission WHERE id ={$stu_id}";
         if (mysqli_query($conn, $sql)) {
            header("location:{$hostname}student.php");
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
