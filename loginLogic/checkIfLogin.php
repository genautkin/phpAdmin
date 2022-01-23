<?php 
require('./tools/tools.php');
session_start();
 if (isset($_GET['logout']) || !isset($_SESSION['user_id'])) {
    session_destroy();
    header('location: ./login');
 }
 _log($_SESSION['user_id']);
    ?>