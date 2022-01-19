<?php 
session_start();
 if (isset($_GET['logout']) || !isset($_SESSION['user_id'])) {
    session_destroy();
    header('location: ./login');
 }
    ?>