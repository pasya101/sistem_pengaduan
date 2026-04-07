<?php 
include 'koneksi.php';
$id = $_GET['id'];

// Ambil nama file foto dari database dulu
$data = mysqli_query($koneksi, "SELECT foto_bukti FROM pengaduan WHERE id_pengaduan='$id'");
$d = mysqli_fetch_array($data);

// Hapus file fisik gambar dari folder bukti_laporan
$foto_lama = "../bukti_laporan/" . $d['foto_bukti'];
if(file_exists($foto_lama)){
    unlink($foto_lama); 
}

// Baru hapus data record dari database
mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id'");

header("location:pengaduan.php");
?>