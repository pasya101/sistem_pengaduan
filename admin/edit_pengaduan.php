<?php 
include 'header.php';
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$d = mysqli_fetch_array($data);
?>

<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2"></i>Tindak Lanjut Pengaduan</h5>
            </div>
            <div class="card-body p-4">
                <form action="update_pengaduan.php" method="POST">
                    <input type="hidden" name="id_pengaduan" value="<?php echo $d['id_pengaduan']; ?>">
                    
                    <div class="mb-3">
                        <label class="text-muted small fw-bold">Tanggal Masuk</label>
                        <input type="text" class="form-control bg-light" value="<?php echo date('d-m-Y', strtotime($d['tgl_pengaduan'])); ?>" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small fw-bold">Nama Pelapor</label>
                        <input type="text" class="form-control bg-light" value="<?php echo htmlspecialchars($d['nama_pelapor']); ?>" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small fw-bold">Isi Keluhan/Laporan</label>
                        <textarea class="form-control bg-light" rows="5" readonly><?php echo htmlspecialchars($d['isi_laporan']); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small fw-bold mb-2">Lampiran Bukti</label><br>
                        <a href="../bukti_laporan/<?php echo $d['foto_bukti']; ?>" target="_blank">
                            <img src="../bukti_laporan/<?php echo $d['foto_bukti']; ?>" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                        </a>
                        <p class="small text-primary mt-1"><i class="bi bi-info-circle me-1"></i> Klik gambar untuk memperbesar</p>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <label class="fw-bold fs-5 text-primary mb-2">Update Status Laporan</label>
                        <select name="status" class="form-select form-select-lg border-primary" required>
                            <option value="0" <?php if($d['status'] == '0'){echo "selected";} ?>>Menunggu / Belum Diproses</option>
                            <option value="proses" <?php if($d['status'] == 'proses'){echo "selected";} ?>>Sedang Diproses (Tindak Lanjut)</option>
                            <option value="selesai" <?php if($d['status'] == 'selesai'){echo "selected";} ?>>Laporan Selesai</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="pengaduan.php" class="btn btn-secondary px-4"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
                        <button type="submit" class="btn btn-success px-5 fw-bold"><i class="bi bi-save-fill me-2"></i>Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>