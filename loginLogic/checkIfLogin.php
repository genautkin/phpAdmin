<?php 
require('./tools/tools.php');
session_start();
 if (isset($_GET['logout'])) {
    session_destroy();
    header('location: ./');
 }

// _log($_SESSION['user_id']);
