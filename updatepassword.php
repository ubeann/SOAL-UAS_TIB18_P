<?php 
    // Import file fungsi
    require_once 'function.php';

    // Cek session apakah sudah login
    $member = checkSession();

    // Cek apakah ada data ganti kata sandi yang dikirim
    if (isset($_POST["change_password"])) {
        // Ganti kata sandi
        $result = changePassword($_POST, $member['username']);

        // Alert
        echo "
            <script>
                alert('$result[reason]');
            </script>
        ";

        if ($result['valid']) {
            header("Location: membership.php");
        }
    }
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
            <div>
                <h1><a href="membership.php" style="font-size: 52px;">⬅</a> Ganti Password</h1>
                <form method="POST">
                <div >
                        <label >Password Lama</label>
                        <input type="password" name="old_password" id="old_password" placeholder="password lama" required></br></br>
                        <label>Password Baru</label>
                        <input type="password" name="new_password" id="new_password" placeholder="password baru" required></br></br>
                        <button type="submit" class="btn" name="change_password">Ganti Kata Sandi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>