<?php 
include 'koneksi.php';

$id     = $_POST['id_pengaduan'];
$status = $_POST['status'];

// Update status di database
mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id'");

echo "<script>alert('Status laporan berhasil diperbarui!'); window.location='pengaduan.php';</script>";
?>