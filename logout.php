<?php 
    // Import file fungsi
    require_once 'function.php';

    // Logout
    if (deleteSession()) {
        // Redirect ke halaman index
        header("Location: membership.php");
        exit;
    }