<?php
  include 'koneksi.php';
  // Simulasi data film & jadwal (nanti bisa dari database)
  $jadwal = [
    '10:00', '13:00', '16:00', '19:00', '21:30'
  ];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Tiket - Nonton Skuy</title>
  <link rel="stylesheet" href="./Style/home.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
</head>
<body style="background-color: #fdf7e4; font-family: 'Poppins', sans-serif;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: yellow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold m-3" href="home.php">Nonton Skuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3">
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="tayang.html">Sedang Tayang</a></li>
        <li class="nav-item"><a class="nav-link" href="populer.html">Popular</a></li>
        <li class="nav-item"><a class="nav-link" href="marchandise.html">Merchandise</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Checkout Form -->
<div class="container" style="margin-top: 8em" data-aos="fade-up">
  <h2 class="text-center fw-bold mb-5">Checkout Tiket</h2>
  <form action="proses_checkout.php" method="post" class="shadow p-4 rounded bg-white">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Pemesan</label>
      <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="film" class="form-label">Pilih Film</label>
      <select name="film" id="film" class="form-select" required>
        <option value="">-- Pilih Film --</option>
        <option>Jujutsu Kaisen</option>
        <option>Avengers: Endgame</option>
        <option>Suzume</option>
        <option>Jumbo</option>
        <option>One Piece Red</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="jadwal" class="form-label">Jadwal Tayang</label>
      <select name="jadwal" id="jadwal" class="form-select" required>
        <?php foreach ($jadwal as $waktu): ?>
          <option value="<?= $waktu ?>"><?= $waktu ?> WIB</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah Tiket</label>
      <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" max="10" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-warning btn-lg text-dark fw-bold">Checkout Sekarang</button>
    </div>
  </form>
</div>

<!-- Footer -->
<footer class="footer text-white py-4 mt-5 shadow" style="background-color: yellow; color: black">
  <div class="container text-center">
    <p class="mb-2" style="color: black">Copyright ©2025 Nonton Skuy.com</p>
    <p class="text-muted small mb-0">
      Nonton Skuy hadir sebagai solusi praktis dan cepat bagi kamu yang ingin menemukan film favorit tanpa ribet.
    </p>
  </div>
</footer>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ duration: 1000, once: true });</script>

</body>
</html>
