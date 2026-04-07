<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pengaduan_masyarakat"; // Nama database untuk sistem pengaduan

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>