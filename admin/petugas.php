<?php 
include 'header.php'; 
include 'koneksi.php'; 

// Proteksi tambahan: Pastikan yang mengakses ini adalah Admin Utama
if($_SESSION['role'] != 'admin'){
    echo "<script>alert('Akses Ditolak! Hanya Admin Utama yang boleh masuk ke halaman ini.'); window.location='dashboard.php';</script>";
    exit;
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Data Petugas & Admin</h3>
    <a href="tambah_petugas.php" class="btn btn-primary shadow-sm"><i class="bi bi-plus-circle me-1"></i> Tambah Pengguna</a>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <table id="tabelData" class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th width="15%" class="text-center">Level Hak Akses</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas DESC");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="fw-bold"><?php echo htmlspecialchars($d['nama_petugas']); ?></td>
                    <td><?php echo htmlspecialchars($d['username']); ?></td>
                    <td class="text-center">
                        <?php if($d['role'] == 'admin') { ?>
                            <span class="badge bg-primary px-3 py-2">Admin Utama</span>
                        <?php } else { ?>
                            <span class="badge bg-secondary px-3 py-2">Petugas</span>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if($_SESSION['username'] != $d['username']) { ?>
                            <a href="hapus_petugas.php?id=<?php echo $d['id_petugas']; ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus akun petugas ini?')"><i class="bi bi-trash-fill me-1"></i>Hapus</a>
                        <?php } else { ?>
                            <span class="text-muted small border px-2 py-1 rounded">Sedang Dipakai</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>