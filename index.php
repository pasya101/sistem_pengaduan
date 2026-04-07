<?php 
include 'admin/koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-brand { font-weight: 800; color: #0d6efd !important; letter-spacing: 1px; }
        .hero-section { background-color: #0d6efd; color: white; padding: 50px 0; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; margin-bottom: 40px; }
        .card-form { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .tracking-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-left: 5px solid #ffc107; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand" href="index.php"><i class="bi bi-megaphone-fill me-2"></i>SUARA WARGA</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="btn btn-outline-primary rounded-pill px-4" href="admin/login.php">Login Petugas</a></li>
    </ul>
  </div>
</nav>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">Sistem Pengaduan Masyarakat</h1>
        <p class="lead">Sampaikan laporan dan keluhan Anda di sini. Kami siap melayani dan menindaklanjuti.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center g-4">
        
        <div class="col-md-7">
            <div class="card card-form">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4">Buat Laporan Baru</h4>
                    
                    <form action="simpan_pengaduan.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Masukkan nama Anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Laporan / Keluhan</label>
                            <textarea name="isi_laporan" class="form-control" rows="5" placeholder="Jelaskan secara detail kejadian atau keluhan Anda..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Upload Bukti (Foto/Gambar)</label>
                            <input type="file" name="foto_bukti" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format yang didukung: JPG, JPEG, PNG (Maks 2MB).</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">Kirim Laporan <i class="bi bi-send-fill ms-2"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h4 class="fw-bold mb-4 mt-2 mt-md-0">Tracking Laporan Terbaru</h4>
            
            <?php 
            $query_laporan = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC LIMIT 5");
            if(mysqli_num_rows($query_laporan) > 0) {
                while($d = mysqli_fetch_array($query_laporan)){ 
                    if($d['status'] == '0') {
                        $badge = '<span class="badge bg-danger">Menunggu</span>';
                    } else if($d['status'] == 'proses') {
                        $badge = '<span class="badge bg-warning text-dark">Diproses</span>';
                    } else {
                        $badge = '<span class="badge bg-success">Selesai</span>';
                    }
            ?>
            <div class="tracking-box mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-primary"><i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars($d['nama_pelapor']); ?></span>
                    <small class="text-muted"><?php echo date('d M Y', strtotime($d['tgl_pengaduan'])); ?></small>
                </div>
                <p class="mb-2 text-truncate"><?php echo htmlspecialchars($d['isi_laporan']); ?></p>
                <div>Status: <?php echo $badge; ?></div>
            </div>
            <?php 
                }
            } else {
                echo "<div class='alert alert-info'>Belum ada laporan yang masuk.</div>";
            }
            ?>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>