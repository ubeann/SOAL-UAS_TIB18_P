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
                    document.location.href = 'index.php';
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
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="username" id="username" placeholder="username" required></br></br>
        <input type="password" name="password" id="password" placeholder="password" required></br></br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>