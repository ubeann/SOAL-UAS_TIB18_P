<?php 
    // Import file fungsi
    require_once 'function.php';

    // Cek session apakah sudah login
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['username'])) {
        header("Location: membership.php");
        exit;
    }

    // Cek apakah ada data yang dikirim
    if (isset($_POST["submit"])) {
        // Tambahkan data ke database
        $result = create($_POST);

        // Cek apakah data berhasil ditambahkan
        if ($result['valid']) {
            // Alert sukses mendaftar
            echo "
                <script>
                    alert('Berhasil mendaftar');
                    document.location.href = 'login.php';
                </script>
            ";
        } else {
            // Alert gagal mendaftar
            echo "
                <script>
                    alert('$result[reason]');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership</title>
    
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
        <div class="kontainer">
            <div class="kolom" style="max-width: 380px;">
                <div class="card">
                    <img src="assets/img/membership.jpg" alt="">
                    <h2>Daftar Membership</h2>
                    <p>Daftar membership sekarang dan dapatkan keuntungan lebih!</p>
                </div>
            </div>
           <div class="kolom">
            <form method="POST" enctype="multipart/form-data">
                <div class="kolom">
                    <label>Nama</label>
                    <input type="text" name="fullname" id="fullname" placeholder="full name">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="username" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="password" required>

                </div>
                <div class="kolom">
                    <label>Foto Profil</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                    <label>Email</label>
                    <input type="email" name="email" id="email" placeholder="contoh@gmail.com">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" placeholder="081-xxx-xxx">
                    <button type="submit" name="submit" class="btn">Register</button>
                    <span style="text-align: center;">Sudah punya akun?</span>
                    <a href="login.php" style="text-align: center;">Login</a>
                </div>
            </form>
            
           </div>
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
    <title>Register</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="fullname" id="fullname" placeholder="full name"></br></br>
        <input type="text" name="username" id="username" placeholder="username" required></br></br>
        <input type="password" name="password" id="password" placeholder="password" required></br></br>
        <input type="file" id="photo" name="photo" accept="image/*"></br></br>
        <input type="email" name="email" id="email" placeholder="email"></br></br>
        <input type="text" name="phone" id="phone" placeholder="phone"></br></br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html> -->