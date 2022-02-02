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
          if (isset($_GET['editPost']) && !isset($_SESSION['dontUpdateCreate'])) {
           $postId = $_GET['editPost'];   
           $sql = "UPDATE Posts
           SET Title = '$title', Article = '$article', Time = '$time'
           WHERE PostId=$postId;";
          }
          else {
            if (isset($_SESSION['dontUpdateCreate'])){
                unset($_SESSION['dontUpdateCreate']);
            }
            $sql = "INSERT INTO Posts VALUES (
                NULL,
                '$userId',
                '$title',
                '$article',
                '$time')";
          }
          $result = mysqli_query($link, $sql);
          if( $result && mysqli_affected_rows($link) > 0 ){  
            unset($_POST);
            setcookie('SuccessAlert',"Your post was successfully save");
            header('location: ./');
            }
            else{
                echo mysqli_error($link);
                exit;
            }
      }    
}
