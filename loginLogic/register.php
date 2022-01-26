
<?php
require './tools/tools.php';
$data = [];
if( isset($_POST['registerSubmit']) ){
    if( empty($_POST['fName']) ||
        empty($_POST['lName']) ||
        empty($_POST['password']) ||
        empty($_POST['rPassword']) ||
        empty($_POST['email'])){
        $data['errorMessage'] = 'Please enter all necessary information';
        return;
      }
      if ($_POST['password'] !== $_POST['rPassword']){
        $data['errorMessage'] = 'Password does not match';
        return;
      }
      if (check_if_user_exists_and_return($_POST['email'])){
        session_start();
        $_SESSION['userAlreadyExists'] = 'User already exists';
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
      }
      $hash = password_hash($_POST['password'], 
          PASSWORD_DEFAULT);
      $link = sql_connect(); 
      $lName = mysqli_real_escape_string($link,$_POST['lName']);
      $fName = mysqli_real_escape_string($link,$_POST['fName']);
      $email = mysqli_real_escape_string($link,$_POST['email']);
      $sql = "INSERT INTO users VALUES (
          NULL,
          '$lName',
          '$fName',
          '$email',
          '$hash',
          NULL)";
      echo $sql;
      $result = mysqli_query($link, $sql);
      if( $result && mysqli_affected_rows($link) > 0 ){  
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($link);
        unset($_POST);
        header('location: ./index');
        exit;
        }
        else{
            echo mysqli_error($link);
            unset($_POST);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;    
        }
      
}

?>