<?php 
    require('configs/connect.php');
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
        $_SESSION['user_id'] = null;
        header("Location: index.php");
    }
?>
