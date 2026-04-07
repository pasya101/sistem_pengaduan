<?php 
include 'header.php'; 
include 'koneksi.php'; 
?>

<div class="row mb-3">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <h3 class="fw-bold"><i class="bi bi-inboxes-fill me-2"></i>Data Pengaduan Masyarakat</h3>
        <button onclick="window.print()" class="btn btn-secondary shadow-sm"><i class="bi bi-printer-fill me-2"></i>Cetak Laporan</button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3 mb-5">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table id="tabelData" class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th width="5%">No</th>
                        <th width="12%">Tanggal</th>
                        <th width="15%">Nama Pelapor</th>
                        <th>Isi Laporan</th>
                        <th width="15%">Bukti Foto</th>
                        <th width="10%">Status</th>
                        <th width="12%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC");
                    while($d = mysqli_fetch_array($data)){
                        // Label Status
                        if($d['status'] == '0') {
                            $badge = '<span class="badge bg-danger">Menunggu</span>';
                        } else if($d['status'] == 'proses') {
                            $badge = '<span class="badge bg-warning text-dark">Diproses</span>';
                        } else {
                            $badge = '<span class="badge bg-success">Selesai</span>';
                        }
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($d['tgl_pengaduan'])); ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($d['nama_pelapor']); ?></td>
                        <td>
                            <?php echo substr(htmlspecialchars($d['isi_laporan']), 0, 50); ?>...
                        </td>
                        <td class="text-center">
                            <a href="../bukti_laporan/<?php echo $d['foto_bukti']; ?>" target="_blank">
                                <img src="../bukti_laporan/<?php echo $d['foto_bukti']; ?>" width="80" class="img-thumbnail rounded shadow-sm" alt="Bukti">
                            </a>
                        </td>
                        <td class="text-center"><?php echo $badge; ?></td>
                        <td class="text-center">
                            <a href="edit_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>" class="btn btn-primary btn-sm mb-1 w-100"><i class="bi bi-search me-1"></i> Proses</a>
                            <a href="hapus_pengaduan.php?id=<?php echo $d['id_pengaduan']; ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Yakin ingin menghapus laporan ini secara permanen?')"><i class="bi bi-trash-fill me-1"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include 'footer.php'; 
?>