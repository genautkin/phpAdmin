<?php
define('UPLOAD_MAX_SIZE', 1024 * 1024 * 2);
$ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm'];
$error = true;
 
if (isset($_POST['submitAvatar'])) {
  if ($_FILES['image']['error'] == 0) {
    echo '<script>console.log("test"); </script>';
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        echo '<script>console.log("$_FILES"); </script>';
      if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE) {
 
        $file_info = pathinfo($_FILES['image']['name']);
        $file_ex = strtolower($file_info['extension']);
        if (in_array($file_ex, $ex)) {
 
          $error = false;
          $file_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
          $target_dir = "uploads/";
          $target_file = $target_dir . $file_name;
          move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
          echo "<script>console.log('uploadDone'); </script>";
           
        }
      }
    }
  }
 
  if ($error) echo '<p>Error uploding this file</p>';
   
}
 
?>