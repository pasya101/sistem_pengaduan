<?php
include 'admin/koneksi.php';

$nama_pelapor = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);
$isi_laporan  = mysqli_real_escape_string($koneksi, $_POST['isi_laporan']);
$tanggal      = date('Y-m-d');
$status       = '0'; // Default laporan masuk adalah '0' (Menunggu)

// Proses Upload Gambar
$rand = rand();
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$nama_file = $_FILES['foto_bukti']['name'];
$ukuran_file = $_FILES['foto_bukti']['size'];
$ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

if (!in_array($ext, $ekstensi_diperbolehkan)) {
    echo "<script>alert('Gagal! Ekstensi file tidak diizinkan. Hanya JPG, JPEG, dan PNG.'); window.location='index.php';</script>";
} else {
    if ($ukuran_file < 2048000) { // Limit 2MB
        $foto_bukti = $rand . '_' . $nama_file;
        move_uploaded_file($_FILES['foto_bukti']['tmp_name'], 'bukti_laporan/' . $foto_bukti);
        
        $query = "INSERT INTO pengaduan (tgl_pengaduan, nama_pelapor, isi_laporan, foto_bukti, status) VALUES ('$tanggal', '$nama_pelapor', '$isi_laporan', '$foto_bukti', '$status')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Laporan berhasil dikirim! Silakan pantau status di halaman utama.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal! Ukuran gambar terlalu besar (Maksimal 2MB).'); window.location='index.php';</script>";
    }
}
?>