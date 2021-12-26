<?php 

    // Global Variable
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kelompok15";
    $table = "tbl_user";

    // Koneksi ke database
    $conn = mysqli_connect($host, $username, $password, $database);
    if(mysqli_connect_error()) {echo "Koneksi mySQL gagal" . mysqli_connect_error();};

    // Query
    function query($query) {
        // Global Variable
        global $conn;

        // Hasil query
        $result = mysqli_query($conn, $query);
        $rows = [];

        // Looping fetch database
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        // Return
        return $rows;
    }

    // Fungsi untuk mengirim data ke database
    function create($data) {
        // Global Variable
        global $conn, $table;

        // Mendapatkan input user
        $fullname   = htmlspecialchars($data["fullname"]);
        $username   = htmlspecialchars($data["username"]);
        $password   = encrypt(htmlspecialchars($data["password"]));
        $email      = htmlspecialchars($data["email"]);
        $phone      = htmlspecialchars($data["phone"]);

        // Cek username sudah ada atau belum
        if (checkUsername($username)){
            return [
                "valid" => false,
                "reason" => "Username sudah ada, silahkan gunakan username lain"
            ];
        }

        // Cek Photo
        if (strlen($_FILES['photo']['name']) > 0 && isset($_FILES['photo']['name'])) {

            // Upload Photo
            $photo    = upload($username);

            // Jika gagal upload
            if (!$photo['valid']) {
                return $photo;
            }

            // Buat query
            $photoURL = $photo['file'];
            $query = "INSERT INTO $table VALUES ('$fullname', '$username', '$password', '$photoURL', '$email', '$phone')";

        } else {
            // Buat query
            $query = "INSERT INTO $table VALUES ('$fullname', '$username', '$password', '', '$email', '$phone')";
        }

        // Query
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        // Return
        return array("valid"=>mysqli_affected_rows($conn), "reason"=>"Berhasil menyimpan data");
    }

    // Fungsi untuk login
    function login($data) {
        // Global Variable
        global $conn, $table;

        // Mendapatkan input user
        $username   = htmlspecialchars($data["username"]);
        $password   = htmlspecialchars($data["password"]);

        // Buat query
        $query = "SELECT * FROM $table WHERE username = '$username'";

        // Query mengambil data member
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);

        // Cek apakah ada data member
        if ($row) {
            // Cek password
            if (password_verify($password, $row['password'])) {
                // Aktifkan session jika belum ada
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Set session
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['photo'] = $row['photo'];

                // Return
                return array("valid"=>true, "reason"=>"Berhasil login");
            } else {
                // Return
                return array("valid"=>false, "reason"=>"Password salah, silahkan coba lagi");
            }
        } else {
            // Return
            return array("valid"=>false, "reason"=>"Username tidak ditemukan");
        }
    }

    // Fungsi untuk mengupdate data ke database
    function edit($newData, $oldUsername, $oldPhoto) {
        // Global Variable
        global $conn, $table;

        // Mendapatkan input user
        $fullname   = htmlspecialchars($newData["fullname"]);
        $username   = htmlspecialchars($newData["username"]);
        $email      = htmlspecialchars($newData["email"]);
        $phone      = htmlspecialchars($newData["phone"]);

        // Cek username sudah ada atau belum
        if (checkUsername($username) && $username != $oldUsername) {
            return [
                "valid" => false,
                "reason" => "Username sudah ada, silahkan gunakan username lain"
            ];
        }

        // Cek Photo
        if (strlen($_FILES['photo']['name']) > 0 && isset($_FILES['photo']['name'])) {
            // Upload Photo
            $photo    = upload($username);

            // Jika gagal upload
            if (!$photo['valid']) {
                return $photo;
            }

            // Hapus foto lama
            if (strlen($oldPhoto) > 0) {
                if (!unlink($oldPhoto)) { 
                    return array("valid"=>false, "reason"=>"Terjadi kesalahan, foto lama tidak dapat dihapus");
                } 
            }

            // Buat query
            $photoURL = $photo['file'];
            $query = "UPDATE $table SET fullname='$fullname', username='$username', photo='$photoURL', email='$email', phone='$phone' WHERE username='$oldUsername'";
        } else {
            // Buat query
            $query = "UPDATE $table SET fullname='$fullname', username='$username', email='$email', phone='$phone' WHERE username='$oldUsername'";
        }

        // Query
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        // Return
        return array("valid"=>mysqli_affected_rows($conn), "reason"=>"Berhasil memperbarui data");
    }

    // Fungsi untuk mengganti password
    function changePassword($data, $username) {
        // Global Variable
        global $conn, $table;

        // Buat query mengammbil data member
        $query = "SELECT * FROM $table WHERE username = '$username'";

        // Query mengambil data member
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);

        // Cek apakah password lama benar
        if (password_verify($data['old_password'], $row['password'])) {
            // Buat query
            $query = "UPDATE $table SET `password`='". encrypt($data['new_password']) ."' WHERE username='$username'";

            // Query
            mysqli_query($conn, $query) or die(mysqli_error($conn));

            // Return
            return array("valid"=>mysqli_affected_rows($conn), "reason"=>"Berhasil mengubah kata sandi");
        } else {
            // Return
            return array("valid"=>false, "reason"=>"Password lama salah, silahkan coba lagi");
        }
    }

    // Fungsi untuk menambahkan foto member
    function upload($username){
        // Detai file
        $nameFile = $_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];
        $tmpName = $_FILES['photo']['tmp_name'];

        // Cek apakah ada error
        if ($error === 4) {
            return array("valid"=>false, "reason"=>"Terjadi kesalahan saat upload foto");
        }

        // Cek apakah file yang diupload adalah gambar
        $validType = ['jpg','jpeg','png'];
        $extFoto = explode('.', $nameFile);
        $extFoto = strtolower(end($extFoto));
        if (!in_array($extFoto, $validType)) {
            return array("valid"=>false, "reason"=>"Ekstensi foto harus .jpg, .jpeg, .png");
        }

        // Disimpan ke folder
        $dir = "img";

        // Buat nama file baru
        $newName = $dir . '/' . $username;
        $newName .= '-';
        $newName .= uniqid();
        $newName .= '.';
        $newName .= $extFoto;

        // Buat direktori jika belum ada
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        // Pindahkan file ke folder img
        move_uploaded_file($tmpName, $newName);

        // Return
        return array("valid"=>true, "file"=>$newName);
    }

    // Fungsi untuk enkripsi password
    function encrypt($password) {
        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Return
        return $password;
    }

    // Fungsi untuk mengecek username apakah sudah ada atau belum
    function checkUsername($username) {
        // Global Variable
        global $conn, $table;

        // Query
        $query = "SELECT * FROM $table WHERE username='$username'";

        // Hasil query
        $result = mysqli_query($conn, $query);

        // Return
        return mysqli_num_rows($result);
    }

    // Fungsi untuk mengecek session
    function checkSession() {
        // Global Variable
        global $conn, $table;

        // Aktifkan session jika belum ada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Cek session
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "SELECT * FROM $table WHERE username='$username'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            header("Location: login.php");
            return false;
        }
    }

    // Fungsi untuk menghapus session
    function deleteSession() {
        // Aktifkan session jika belum ada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Hapus session
        if (isset($_SESSION['username'])) {
            session_destroy();
        }

        // Return
        return true;
    }