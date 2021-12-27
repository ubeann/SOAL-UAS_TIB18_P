<?php 
    // Import file fungsi
    require_once 'function.php';

    // Cek session apakah sudah login
    $member = checkSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliner</title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/env.css">
    <link rel="stylesheet" href="assets/css/event.css">
</head>
<body>
    <nav>
        <img src="assets/img/icon.png" class="logo" alt="" srcset="">
        <div class="menu">
            <a href="index.php">Beranda</a>
            <a href="register.php" class="active">Membership</a>
            <a href="kuliner.php">Kuliner</a>
            <a href="contact-us.php">Contact Us</a>
        </div>
    </nav>
    <div class="content">
        <div class="kontainer" style="justify-content: center;">
            <div class="kolom" style="max-width: 380px;">
                <div class="card">
                    <?php if (strlen($member['photo']) > 0): ?>
                        <img src=<?= $member['photo']; ?> alt="Foto" width="200px"></br></br>
                    <?php endif; ?>
                    <h2 style="margin-bottom: 8px;"><?= $member['fullname']; ?></h2>
                    <span>username : <?= $member['username']; ?></span>
                    <span>email : <?= $member['email']; ?></span>
                    <span>phone : <?= $member['phone']; ?></span>
                </div>
                <a href="updateprofil.php" class="btn">Update Profil</a>
                <a href="updatepassword.php" class="btn">Ganti Password</a>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>
    </div>
    
</body>
</html>