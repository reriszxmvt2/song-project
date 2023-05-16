<?php
    if (!isset($_SESSION['username'])) {
        header('location: ../sign-in-controller.php');
    }
