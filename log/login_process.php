<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../database/config.php';

$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$koneksi) {
    die("Koneksi database ke panel admin gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $hasil = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) === 1) {
        $data_admin = mysqli_fetch_assoc($hasil);
        
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $data_admin['id'];
        $_SESSION['admin_username'] = $data_admin['username'];
        $_SESSION['admin_nama'] = $data_admin['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        echo "<script>
                alert('Username atau password salah, Lae!');
                window.history.back();
              </script>";
    }
} else {
    header("Location: auth/login.php");
    exit;
}
?>