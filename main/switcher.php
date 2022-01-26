<?php 
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addPost':
            require './main/post.php';
            break;
        default:
            require './main/main.php';
            break;
    }
}
else {
    require './main/main.php';
}