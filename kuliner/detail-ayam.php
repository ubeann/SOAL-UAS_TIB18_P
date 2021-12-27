<?php 
    // Import file fungsi
    require_once '../function.php';

    // Cek session apakah sudah login
    $member = checkSession("Kuliner");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kuliner</title>
        
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/env.css">
    <link rel="stylesheet" href="../assets/css/kuliner.css">
    <link rel="stylesheet" href="../assets/css/detail-kuliner.css">
</head>
<body>
    <nav>
        <img src="../assets/img/icon.png" class="logo" alt="" srcset="">
        <div class="menu">
            <a href="../index.php">Beranda</a>
            <a href="../register.php">Membership</a>
            <a href="../kuliner.php" class="active">Kuliner</a>
            <a href="../contact-us.php">Contact Us</a>
        </div>
    </nav>
    <div class="content">
        <h1><a href="../kuliner.php" style="font-size: 52px;">⬅</a> Ayam Betutu</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="kontainer">
            <div class="card">
                <img src="../assets/img/ayam.jpg" alt="">
            </div>
            <div class="teks">
                <h4>Deskripsi</h4>
                <p>Makanan ini pasti sudah tidak asing lagi di telinga kita. Olahan ayam yang satu ini memang selalu mampu menggoyang lidah siapa saja yang menyantapnya. Ayam betutu diolah dengam bumbu rempah seperti daun jeruk, serai, daun salam, kunyit, jahe, bawang merah, kemiri, dan rempah lainnya yang membuat rasanya semakin kaya.
                </p>
                <h4>Lokasi</h4>
                <p>Bali</p>
                <h4>Referensi</h4>
                <p>https://katadata.co.id/safrezifitra/berita/61109cb1e6c96/8-makanan-khas-bali-incaran-wisatawan</p>
            </div>
                
        </div>
        <?php else: ?>
            <h2>Harap daftar membership</h2>
        <?php endif; ?>
        
    </div>
    
</body>
</html>