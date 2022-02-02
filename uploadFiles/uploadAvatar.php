<?php
define('UPLOAD_MAX_SIZE', 1024 * 1024 * 5);
$ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm'];
$error = true;
 
if (isset($_POST['submitAvatar'])) {
  if ($_FILES['image']['error'] == 0) {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE) {
 
        $file_info = pathinfo($_FILES['image']['name']);
        $file_ex = strtolower($file_info['extension']);
        if (in_array($file_ex, $ex)) {
          $error = false;
          $file_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
          $target_dir = "uploads/".$_SESSION['user_id']."/";
          if (!is_dir($target_dir)) {
            mkdir($target_dir);
          }
          $target_file = $target_dir . $file_name;
          move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
          echo "<script>console.log('uploadDone'); </script>";
          updateAvatarName($file_name);
          //Prevent to upload again when refresh
          unset($_POST);
          header("Location: ".$_SERVER['PHP_SELF']);
          exit;
           
        }
      }
    }
  }
 
  if ($error) echo '<p>Error uploding this file</p>';
   
}

function updateAvatarName($name) {
  $_SESSION['user']['Avatar'] = $name;
  $link = sql_connect();
  $id = $_SESSION['user_id'];
  $sql = " UPDATE users SET Avatar = '$name' WHERE User_id = '$id';";
  $result = $link->query($sql);
  if ($result) echo $result;
  printSqlResult($result, $link);
}
 
?>