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
    <title>Profile</title>
</head>
<body>
    <h1>Data Pribadi</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="fullname" id="fullname" placeholder="full name" value="<?= $member['fullname']; ?>"></br></br>
        <input type="text" name="username" id="username" placeholder="username" value=<?= $member['username']; ?> required></br></br>
        <?php if (strlen($member['photo']) > 0): ?>
            <img src=<?= $member['photo']; ?> alt="Foto" width="200px"></br></br>
        <?php endif; ?>
        <input type="file" id="photo" name="photo" accept="image/*"></br></br>
        <input type="email" name="email" id="email" placeholder="email" value=<?= $member['email']; ?>></br></br>
        <?php if ($member['phone'] != 0): ?>
            <input type="text" name="phone" id="phone" placeholder="phone" value=<?= $member['phone']; ?>></br></br>
        <?php else: ?>
                <input type="text" name="phone" id="phone" placeholder="phone"></br></br>
        <?php endif; ?>
        <button type="submit" name="edit">Simpan</button>
    </form>

    <hr>

    <h1>Kata Sandi</h1>
    <form method="POST">
        <input type="password" name="old_password" id="old_password" placeholder="password lama" required></br></br>
        <input type="password" name="new_password" id="new_password" placeholder="password baru" required></br></br>
        <button type="submit" name="change_password">Ganti Kata Sandi</button>
    </form>
</body>
</html>