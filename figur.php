<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pesan Figur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./Style/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
    }
    .figur-card {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      background: white;
      transition: 0.3s ease-in-out;
    }
    .figur-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }
    .figur-img {
      height: 180px;
      object-fit: cover;
    }
    .figur-title {
      font-size: 1.1em;
      font-weight: 600;
    }
    .figur-price {
      font-weight: bold;
      color: #ff5722;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: yellow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold m-3" href="#">Nonton Skuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav gap-3">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="tayang.php">Sedang Tayang</a></li>
        <li class="nav-item"><a class="nav-link" href="populer.php">Popular</a></li>
        <li class="nav-item"><a class="nav-link active" href="marchandise.php">Merchandise</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Title -->
<div class="container text-center" style="margin-top: 7em;">
  <h2 class="fw-bold mb-4">Pilih Figur Favorit Kamu 🧸</h2>
</div>

<!-- Figur Cards -->
<div class="container">
  <div class="row row-cols-2 row-cols-md-4 g-4">
    <?php
    // Koneksi ke database
    $koneksi = new mysqli("localhost", "root", "", "db_bioskop");

    // Cek koneksi
    if ($koneksi->connect_error) {
      die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Ambil data dari tabel products dengan kategori 'figur'
    $result = $koneksi->query("SELECT * FROM products WHERE kategori = 'figure' ORDER BY id_product DESC");

    // Tampilkan setiap produk sebagai kartu
    while ($figur = $result->fetch_assoc()) {
      echo '
      <div class="col">
        <div class="card figur-card text-center p-2">
          <img src="admin/'.htmlspecialchars($figur["gambar"]).'" class="card-img-top figur-img" alt="'.htmlspecialchars($figur["nama_produk"]).'" />
          <div class="card-body">
            <p class="figur-title">'.$figur["nama_produk"].'</p>
            <p class="figur-price">Rp '.number_format($figur["harga"], 0, ',', '.').'</p>
            <a href="#" class="btn btn-warning btn-sm w-100">Pesan</a>
          </div>
        </div>
      </div>';
    }

    // Tutup koneksi
    $koneksi->close();
    ?>
  </div>
</div>

<!-- Footer -->
<footer class="footer text-white py-4 shadow" style="background-color: yellow; color: black; margin-top: 5em;">
  <div class="container text-center">
    <div class="social-icons mb-3">
      <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
      <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
    </div>
    <p class="mb-2" style="color: black">Copyright ©2025 Nonton Skuy.com</p>
    <div class="footer-links mb-3">
      <a href="#" class="text-orange mx-2">About Us</a>
      <a href="#" class="text-orange mx-2">Privacy Policy</a>
      <a href="#" class="text-orange mx-2">Contact Us</a>
      <a href="#" class="text-orange mx-2">Movie Updates</a>
      <a href="#" class="text-orange mx-2">All Movies</a>
    </div>
    <p class="text-muted small mb-0">
      Koleksi figurin kece buat nambah vibes nonton dan koleksimu! Langsung pilih dan pesan 🧸✨
    </p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
