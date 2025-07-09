<?php
session_start();
if (!isset($_SESSION['checkout'])) {
  header('Location: pembayaran.php');
  exit;
}

$data = $_SESSION['checkout'];
$nama = $data['nama'];
$email = $data['email'];
$film = $data['film'];
$jadwal = $data['jadwal'];
$jumlah = (int) $data['jumlah'];
$harga_per_tiket = 35000;
$total = $jumlah * $harga_per_tiket;

// unset($_SESSION['checkout']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Booking - Nonton Skuy</title>
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

    h2 {
      font-size: 2rem;
    }

    .table th, .table td {
      font-size: 1rem;
    }

    footer p {
      font-size: 0.9rem;
    }

    @media screen and (max-width: 768px) {
      body {
        font-size: 14px;
      }

      .container-desktop {
        padding: 20px;
      }

      h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: yellow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold m-3" href="pembayarans.php">Nonton Skuy</a>
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
  <h2 class="text-center fw-bold mb-4">Detail Booking</h2>
  <table class="table table-bordered">
    <tr><th>Nama Pemesan</th><td><?= htmlspecialchars($nama) ?></td></tr>
    <tr><th>Email</th><td><?= htmlspecialchars($email) ?></td></tr>
    <tr><th>Film</th><td><?= htmlspecialchars($film) ?></td></tr>
    <tr><th>Jadwal Tayang</th><td><?= htmlspecialchars($jadwal) ?> WIB</td></tr>
    <tr><th>Jumlah Tiket</th><td><?= htmlspecialchars($jumlah) ?> Tiket</td></tr>
    <tr><th>Harga per Tiket</th><td>Rp <?= number_format($harga_per_tiket, 0, ',', '.') ?></td></tr>
    <tr><th>Total Bayar</th><td class="fw-bold text-success">Rp <?= number_format($total, 0, ',', '.') ?></td></tr>
  </table>
  <div class="text-center mt-4">
    <a href="pembayaran.php" class="btn btn-warning fw-bold text-dark">Bayar sekarang</a>
  </div>
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
