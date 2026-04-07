<?php
session_start();
include 'koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$captcha  = $_POST['captcha'];

if ($captcha == $_SESSION['captcha']) {
    // Cek ke tabel petugas
    $data = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $p = mysqli_fetch_assoc($data);
        
        // Simpan sesi
        $_SESSION['username'] = $username;
        $_SESSION['nama_petugas'] = $p['nama_petugas'];
        $_SESSION['role'] = $p['role'];
        $_SESSION['status'] = "login";
        
        echo "<script>alert('Selamat datang, ".$p['nama_petugas']."!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('CAPTCHA salah!'); window.location='login.php';</script>";
}
?>