<?php
    session_start();
    
    if (empty($_SESSION['username'])) {
        header('location: ../sign-in-controller.php');
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ../sign-in-controller.php');
    }
