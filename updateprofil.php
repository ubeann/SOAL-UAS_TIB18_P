<?php 
    // Import file fungsi
    require_once 'function.php';

    // Cek session apakah sudah login
    $member = checkSession();

    // Cek apakah ada data edit yang dikirim
    if (isset($_POST["edit"])) {
        // Edit data
        $result = edit($_POST, $member['username'], $member['photo']);

        // Alert
        echo "
            <script>
                alert('$result[reason]');
            </script>
        ";

        if ($result['valid']) {
            header("Refresh:0");
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
                <h1><a href="membership.php" style="font-size: 52px;">⬅</a> Update Profil</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="kolom">
                        <label>Nama</label>
                        <input type="text" name="fullname" id="fullname" placeholder="full name" value="<?= $member['fullname']; ?>">
                        <label>Username</label>
                        <input type="text" name="username" id="username" placeholder="username" value=<?= $member['username']; ?> required>
                    </div>
                    <div class="kolom">
                        <label>Foto Profil</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <label>Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@gmail.com" value=<?= $member['email']; ?>>
                        <label>Nomor Telepon</label>
                        <input type="text" name="phone" id="phone" placeholder="081-xxx-xxx" value=<?= $member['phone']; ?>>
                        <button type="submit" name="submit" class="btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>