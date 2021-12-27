<?php 
    // Aktifkan session jika belum ada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Kuliner Indonesia</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/env.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- JS -->
    <script src="assets/js/env.js"></script>
</head>

<body>
    <nav>
        <img src="assets/img/icon.png" class="logo" alt="" srcset="">
        <div class="menu">
            <a href="index.php" class="active">Beranda</a>
            <a href="register.php">Membership</a>
            <a href="kuliner.php">Kuliner</a>
            <a href="contact-us.php">Contact Us</a>
        </div>
    </nav>
    <div class="video-container">
        <video src="assets/video/Indonesia Street Food Cinematic.mp4" autoplay muted loop></video>
    </div>
    <div class="content">
        <div class="shape">
            <h1>Info Kuliner Indonesia</h1>
            <p>Informasi lengkap dunia kuliner dari resep menu makanan / minuman masakan Indonesia, tempat jajanan pasar hingga restoran terkenal</p>
            <?php if (isset($_SESSION['username'])): ?>
                <a class="btn" href="membership.php">Halaman Membership</a>
            <?php else: ?>
                <a class="btn" href="register.php">Daftar Membership</a>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>
<!--  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php">Logout</a>
        <a href="profile.php">Profil</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</body>
</html> -->

