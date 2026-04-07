<?php
session_start();
// Proteksi halaman admin
if($_SESSION['status'] != "login"){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        .navbar-custom { background-color: #0d6efd; }
        .navbar-custom .nav-link { color: rgba(255,255,255,0.85) !important; font-weight: 500;}
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active { color: #fff !important; }
        .footer-admin { background-color: #0d6efd; color: white; padding: 25px 0; margin-top: 50px; }
        body { background-color: #f4f7f6; }
        .main-container { background-color: white; min-height: 75vh; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.03); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold tracking-wide" href="dashboard.php"><i class="bi bi-shield-check me-2"></i>ADMIN PANEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="pengaduan.php">Data Pengaduan</a></li>
        <?php if($_SESSION['role'] == 'admin') { ?>
        <li class="nav-item"><a class="nav-link" href="petugas.php">Data Petugas</a></li>
        <?php } ?>
      </ul>
      
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-4 text-white">
            <i class="bi bi-person-circle me-1"></i> Halo, <strong><?php echo $_SESSION['nama_petugas']; ?></strong>
        </li>
        <li class="nav-item">
            <a class="btn btn-light btn-sm text-primary fw-bold px-4 rounded-pill shadow-sm" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container main-container mb-5">