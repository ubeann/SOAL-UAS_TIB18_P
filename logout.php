<?php 
    // Import file fungsi
    require_once 'function.php';

    // Logout
    if (deleteSession()) {
        // Redirect ke halaman index
        header("Location: index.php");
        exit;
    }