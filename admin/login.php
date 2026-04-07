<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Petugas - Suara Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: #f4f7f6;">
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header text-center bg-primary text-white rounded-top py-3">
                    <h5 class="mb-0"><i class="bi bi-shield-lock-fill me-2"></i>Login Petugas</h5>
                </div>
                <div class="card-body p-4">
                    <form action="proses_login.php" method="POST">
                        <div class="mb-3">
                            <label class="fw-bold text-muted small">Username</label>
                            <input type="text" name="username" class="form-control bg-light" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold text-muted small">Password</label>
                            <input type="password" name="password" class="form-control bg-light" required>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold text-muted small">Kode Keamanan (CAPTCHA)</label><br>
                            <img src="../captcha.php" alt="captcha" class="mb-2 border rounded">
                            <input type="text" name="captcha" class="form-control bg-light" placeholder="Masukkan tulisan di atas" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold">Masuk Sistem</button>
                        <hr class="my-4">
                        <div class="text-center">
                            <a href="../index.php" class="text-decoration-none text-muted small">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Utama
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>