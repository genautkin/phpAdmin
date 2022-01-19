<?php 
$data = [];
if( isset($_POST['submit']) ){
  if(  empty($_POST['email']) || empty($_POST['password'])){
    $data['errorMessage'] = 'Please enter email and password';
    return;
  }
  if( $_POST['email'] === 'gena@gmail.com' && $_POST['password'] === '123'){
    if (isset($_POST['checkboxRememberMe'])) {
        $for_time = 60 * 60 * 24;
        session_set_cookie_params($for_time);
    }
    session_start();
    $_SESSION['user_id'] = 12345;
    header('location: ./index');
    return;
  }
  else {
    $data['errorMessage'] = 'Please enter valid email and password';
    return;
  }

//     $email = $_POST['email'];
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $data['emailValidation'] = false;
//       }
//       else {
//         $data['emailValidation'] = true;
//       }
      
//   }
//   if( isset($_POST['password']) ){
//         if (strlen($_POST['password']) === 0) {
//             $data['passwordInValid'] = true;
//         }
//   }
   
}
?>