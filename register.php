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
</html>