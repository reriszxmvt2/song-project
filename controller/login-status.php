<?php
    if (empty($_SESSION['username'])) {
        header('location: ../sign-in-controller.php');
    }
