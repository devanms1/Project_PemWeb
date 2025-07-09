<?php
session_start();

// Cek apakah data booking masih ada
if (!isset($_SESSION['checkout'])) {
  header('Location: pembayaran.php');
  exit;
}

$data = $_SESSION['checkout'];
$nama = $data['nama'];
$film = $data['film'];
$total = (int)$data['jumlah'] * 35000;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pembayaran - Nonton Skuy</title>
  <link rel="stylesheet" href="./Style/home.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fdf7e4;
      font-family: 'Poppins', sans-serif;
    }

    .container-desktop {
      max-width: 800px;
      margin: 100px auto;
      background-color: white;
      border-radius: 10px;
      padding: 30px 40px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    label {
      font-weight: bold;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: yellow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold m-3" href="home.php">Nonton Skuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="tayang.html">Sedang Tayang</a></li>
        <li class="nav-item"><a class="nav-link" href="populer.html">Popular</a></li>
        <li class="nav-item"><a class="nav-link" href="marchandise.html">Merchandise</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container-desktop" data-aos="fade-up">
  <h2 class="text-center fw-bold mb-4">Pembayaran Tiket</h2>

  <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($nama) ?></p>
  <p><strong>Film:</strong> <?= htmlspecialchars($film) ?></p>
  <p><strong>Total Bayar:</strong> <span class="text-success fw-bold">Rp <?= number_format($total, 0, ',', '.') ?></span></p>

  <form action="proses_pembayaran.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="metode" class="form-label">Metode Pembayaran</label>
      <select name="metode" id="metode" class="form-select" required>
        <option value="">-- Pilih Metode --</option>
        <option value="Transfer Bank">Transfer Bank (BCA, BRI, Mandiri)</option>
        <option value="QRIS">QRIS</option>
        <option value="E-Wallet">E-Wallet (Gopay, Dana, OVO)</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
      <input type="file" name="bukti" id="bukti" class="form-control" accept="image/*" required>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success fw-bold text-white btn-lg">Kirim Pembayaran</button>
    </div>
  </form>
</div>

<!-- Footer -->
<footer class="footer text-white py-4 mt-5 shadow" style="background-color: yellow; color: black">
  <div class="container text-center">
    <p class="mb-2" style="color: black">©2025 Nonton Skuy.com</p>
    <p class="text-muted small mb-0">Nonton Skuy hadir sebagai solusi praktis dan cepat bagi kamu yang ingin menemukan film favorit tanpa ribet.</p>
  </div>
</footer>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration: 1000, once: true });</script>

</body>
</html>
