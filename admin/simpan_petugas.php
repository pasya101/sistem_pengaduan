<?php 
include 'koneksi.php';

$nama     = mysqli_real_escape_string($koneksi, $_POST['nama_petugas']);
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$role     = $_POST['role'];

// Cek apakah username sudah dipakai
$cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
if(mysqli_num_rows($cek) > 0){
    echo "<script>alert('Gagal! Username tersebut sudah digunakan. Silakan cari username lain.'); window.location='tambah_petugas.php';</script>";
} else {
    mysqli_query($koneksi, "INSERT INTO petugas (username, password, nama_petugas, role) VALUES ('$username', '$password', '$nama', '$role')");
    echo "<script>alert('Berhasil menambahkan petugas baru!'); window.location='petugas.php';</script>";
}
?>