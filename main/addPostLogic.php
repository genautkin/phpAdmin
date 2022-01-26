<?php $data = [];
if( isset($_POST['add_post']) ){
    if( empty($_POST['title']) ||
        empty($_POST['article'])){
        $data['errorMessage'] = 'Please enter all necessary information';
      }
      else {
          $link = sql_connect(); 
          $title = htmlspecialchars(mysqli_real_escape_string($link,$_POST['title']), ENT_QUOTES, 'UTF-8');
          $article = htmlspecialchars(mysqli_real_escape_string($link,$_POST['article']), ENT_QUOTES, 'UTF-8');
          $time = time();
          $userId = $_SESSION['user_id'];
          $sql = "INSERT INTO posts VALUES (
              NULL,
              '$userId',
              '$title',
              '$article',
              '$time')";
          $result = mysqli_query($link, $sql);
          if( $result && mysqli_affected_rows($link) > 0 ){  
            unset($_POST);
            header('location: ./');
            }
            else{
                echo mysqli_error($link);
                exit;
            }
      }    
}
