<?php
    session_start();
    
    if (empty($_SESSION['username'])) {
        header('location: ../sign-in-controller.php');
    }
