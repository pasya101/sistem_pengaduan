<?php 
include 'header.php'; 
// Proteksi hak akses
if($_SESSION['role'] != 'admin'){
    header("location:dashboard.php");
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold mb-0"><i class="bi bi-person-plus-fill me-2"></i>Tambah Pengguna Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="simpan_petugas.php" method="POST">
                    <div class="mb-3">
                        <label class="fw-bold text-muted small">Nama Lengkap</label>
                        <input type="text" name="nama_petugas" class="form-control" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="fw-bold text-muted small">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Tanpa spasi, contoh: budi123" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="fw-bold text-muted small">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="fw-bold text-muted small">Level Hak Akses</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Level Akses --</option>
                            <option value="petugas">Petugas (Hanya kelola pengaduan)</option>
                            <option value="admin">Admin Utama (Akses penuh)</option>
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="petugas.php" class="btn btn-secondary px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>