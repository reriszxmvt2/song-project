<?php
    session_start();
    include 'path.php';
    
    if (empty($_SESSION['username'])) {
        header('location: ' . $redirectToSignin);
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: ' . $redirectToSignin);
    }
