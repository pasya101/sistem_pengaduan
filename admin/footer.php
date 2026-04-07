</div> <footer class="footer-admin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="bi bi-shield-check me-2"></i>Admin Panel - Suara Warga</h5>
                <p class="small opacity-75">Sistem Pengaduan Masyarakat berbasis PHP, MySQL, Bootstrap dan DataTables.</p>
            </div>
            <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">
                <p class="mb-0 small">&copy; <?php echo date('Y'); ?> Layanan Pengaduan Masyarakat.</p>
                <p class="small opacity-75">Gunakan sistem ini dengan bijak dan penuh tanggung jawab.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Mengaktifkan fitur DataTables otomatis pada tabel dengan ID 'tabelData'
    $(document).ready(function () {
        $('#tabelData').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" // Terjemahan bahasa Indonesia
            }
        });
    });
</script>
</body>
</html>