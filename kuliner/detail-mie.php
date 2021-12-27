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
        <h1><a href="../kuliner.php" style="font-size: 52px;">⬅</a> Mie Aceh</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="kontainer">
            <div class="card">
                <img src="../assets/img/mie.jpg" alt="">
            </div>
            <div class="teks">
                <h4>Deskripsi</h4>
                <p>Aceh terkenal dengan kuliner khas mi aceh. Bahan dasar pembuatan mi tidak menggunakan tepung terigu, melainkan tepung tapioka. Proses pemasakannya pun terbilang unik, yaitu menggunakan arang. Alasannya, agar proses penyerapan panas pada wajan dapat merata. Campuran pada mi aceh cukup beragam, mulai dari udang, kepiting, daging, dan ada juga cumi-cumi. Tipe penyajiannya pun dapat dipilih, yakni goreng basah, goreng, atau direbus, tinggal disesuaikan dengan selera Anda. Dengan rasanya yang khas, mi aceh kini dijual di berbagai kota di Indonesia.
                </p>
                <h4>Lokasi</h4>
                <p>Aceh</p>
                <h4>Referensi</h4>
                <p>https://katadata.co.id/intan/berita/617bd9da94d63/10-makanan-khas-sumatra-dari-aceh-sampai-lampung</p>
            </div>
                
        </div>
        <?php else: ?>
            <h2>Harap daftar membership</h2>
        <?php endif; ?>
        
    </div>
    
</body>
</html>