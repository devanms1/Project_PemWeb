<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT o.id_order, u.nama AS nama_user, o.tanggal, o.total_harga, o.status
        FROM orders o
        JOIN users u ON o.id_user = u.id_user
        ORDER BY o.tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Pemesanan - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #fffbd5;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: yellow;
    }

    .table thead {
      background-color: #ffee00;
      color: black;
    }

    .table tbody tr:hover {
      background-color: #fff7a1;
    }

    h2 {
      font-weight: 600;
      color: #333;
    }

    .btn-back {
      background-color: #ffc107;
      border: none;
      color: black;
      font-weight: 500;
    }

    .btn-back:hover {
      background-color: #e0a800;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">🎫 NontonSkuy - Admin</a>
    <div class="d-flex">
      <a href="home_admin.php" class="btn btn-back me-2">← Dashboard</a>
      <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4 text-center">📋 History Pemesanan</h2>

  <div class="table-responsive">
    <table class="table table-hover table-bordered text-center align-middle">
      <thead class="table-warning">
        <tr>
          <th>ID Order</th>
          <th>Nama User</th>
          <th>Tanggal</th>
          <th>Total Harga</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id_order'] ?></td>
              <td><?= htmlspecialchars($row['nama_user']) ?></td>
              <td><?= $row['tanggal'] ?></td>
              <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
              <td><span class="badge bg-success"><?= ucfirst($row['status']) ?></span></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-muted">Belum ada data pemesanan.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
