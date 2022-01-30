<?php 
if (isset($_GET['addPost']) || isset($_GET['editPost'])) {
    require './main/post.php';
    return;
}
else {
    require './main/main.php';
}