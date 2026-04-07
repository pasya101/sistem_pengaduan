<?php 
include 'header.php'; 
include 'koneksi.php'; 

// Query untuk menghitung statistik laporan
$total_laporan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan"));
$laporan_menunggu = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='0'"));
$laporan_proses = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'"));
$laporan_selesai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='selesai'"));
?>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="p-4 bg-light rounded-3 border-start border-primary border-5 shadow-sm">
            <h2 class="fw-bold">Selamat Datang, <?php echo $_SESSION['nama_petugas']; ?>!</h2>
            <p class="fs-5 text-muted mb-0">Ini adalah halaman Administrasi Sistem Pengaduan. Pantau dan tindak lanjuti laporan masyarakat dari sini.</p>
        </div>
    </div>
</div>

<h5 class="fw-bold mb-3"><i class="bi bi-bar-chart-fill me-2"></i>Ringkasan Data Pengaduan</h5>

<div class="row text-center g-3 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white shadow-sm h-100 border-0">
            <div class="card-body py-4">
                <i class="bi bi-collection-fill display-4 opacity-50 mb-2"></i>
                <h6 class="fw-bold text-uppercase">Total Laporan</h6>
                <h1 class="display-5 fw-bold mb-0"><?php echo $total_laporan; ?></h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-danger text-white shadow-sm h-100 border-0">
            <div class="card-body py-4">
                <i class="bi bi-hourglass-split display-4 opacity-50 mb-2"></i>
                <h6 class="fw-bold text-uppercase">Menunggu Diproses</h6>
                <h1 class="display-5 fw-bold mb-0"><?php echo $laporan_menunggu; ?></h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-dark shadow-sm h-100 border-0">
            <div class="card-body py-4">
                <i class="bi bi-tools display-4 opacity-50 mb-2"></i>
                <h6 class="fw-bold text-uppercase">Sedang Diproses</h6>
                <h1 class="display-5 fw-bold mb-0"><?php echo $laporan_proses; ?></h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white shadow-sm h-100 border-0">
            <div class="card-body py-4">
                <i class="bi bi-check-circle-fill display-4 opacity-50 mb-2"></i>
                <h6 class="fw-bold text-uppercase">Laporan Selesai</h6>
                <h1 class="display-5 fw-bold mb-0"><?php echo $laporan_selesai; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-5 mb-3">
    <a href="pengaduan.php" class="btn btn-primary btn-lg rounded-pill px-5 shadow"><i class="bi bi-folder2-open me-2"></i>Kelola Data Pengaduan Sekarang</a>
</div>

<?php 
include 'footer.php'; 
?>