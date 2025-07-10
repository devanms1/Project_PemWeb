<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../login.php");
  exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - NontonSkuy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <link
    href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
    rel="stylesheet" />

  <style>
    body {
      background-color: #fffdf0;
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    /* .navbar {
      background-color: #ffd700;
    }

    .navbar-brand, .nav-link {
      color: #000 !important;
      font-weight: 600;
    }

    .navbar-nav .nav-link:hover {
      color: #444 !important;
    } */

    .card {
      background-color: #fff;
      border-left: 6px solid #ffd700;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-weight: bold;
    }

    .display-6 {
      font-size: 2.5rem;
      color: #ff9800;
    }

    .text-muted {
      font-size: 14px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav
    class="navbar navbar-expand-lg fixed-top shadow-lg"
    style="background-color: yellow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold m-3" href="#">Nonton Skuy</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse justify-content-end"
        id="navbarNavDropdown">
        <ul class="navbar-nav gap-3">
          <li class="nav-item">
            <a class="nav-link" href="../Admin/HalamanTambah.php">Tambah Film</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/drink_admin.php">Tambah Snack</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/RiwayatTransaksi.php">Pantau User</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Dashboard -->
  <div class="container pt-4" style="margin-top: 10em;">
    <h2>Selamat datang, Admin <?php echo $_SESSION['nama']; ?> 👋</h2>
    <p class="text-muted">Kelola data pengguna, film, dan pesanan tiket melalui menu navigasi di atas.</p>

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card p-4">
          <h5>Total Film</h5>
          <?php
          $film = $conn->query("SELECT COUNT(*) as total FROM movies")->fetch_assoc();
          echo "<p class='display-6'>" . $film['total'] . "</p>";
          ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h5>Total Pengguna</h5>
          <?php
          $user = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc();
          echo "<p class='display-6'>" . $user['total'] . "</p>";
          ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h5>Total Pesanan</h5>
          <?php
          $pesanan = $conn->query("SELECT COUNT(*) as total FROM orders")->fetch_assoc();
          echo "<p class='display-6'>" . $pesanan['total'] . "</p>";
          ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>