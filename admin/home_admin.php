<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2>Selamat datang, Admin <?php echo $_SESSION['nama']; ?></h2>
  <p class="mb-4">Gunakan menu di bawah untuk mengelola data:</p>

  <div class="list-group">
    <a href="kelola_film.php" class="list-group-item list-group-item-action">🎬 Kelola Film</a>
    <a href="daftar_user.php" class="list-group-item list-group-item-action">👥 Lihat Daftar User</a>
    <a href="daftar_pesanan.php" class="list-group-item list-group-item-action">🧾 Lihat Semua Pesanan</a>
  </div>

  <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
</div>
</body>
</html>
