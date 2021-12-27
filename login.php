<?php 
    // Import file fungsi
    require_once 'function.php';

    // Cek session apakah sudah login
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }

    // Cek apakah ada data yang dikirim
    if (isset($_POST["submit"])) {
        // Login
        $result = login($_POST);

        // Cek apakah berhasil login
        if ($result['valid']) {
            // Alert sukses login
            echo "
                <script>
                    alert('$result[reason]');
                    document.location.href = 'membership.php';
                </script>
            ";
        } else {
            // Alert gagal login
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
                    <h2>Login Membership</h2>
                    <p>Masuk ke akun membership agar fitur membershipmu aktif!</p>
                </div>
            </div>
           <div class="kolom">
            <form method="POST" enctype="multipart/form-data">
                <div class="kolom">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="username" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="password" required>
                    <button type="submit" name="submit" class="btn">Login</button>
                    <span style="text-align: center;">Belum punya akun?</span>
                    <a href="register.php" style="text-align: center;">Daftar Membership</a>
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
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" id="username" placeholder="username" required></br></br>
        <input type="password" name="password" id="password" placeholder="password" required></br></br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html> -->