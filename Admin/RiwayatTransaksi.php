<?php
session_start();

// Pastikan hanya admin yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$koneksi = new mysqli("localhost", "root", "", "db_bioskop");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT * FROM tb_pembayaran ORDER BY created_at DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
            background-color: #fffef2;
        }
        .navbar {
            background-color: yellow;
        }
        table img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Nonton Skuy</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item"><a class="nav-link" href="home_admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Riwayat Transaksi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ISI RIWAYAT -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Riwayat Transaksi Pengguna</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-warning">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>Metode</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($result->num_rows > 0):
                        while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['metode']) ?></td>
                            <td>
                                <?php if (!empty($row['bukti'])): ?>
                                    <img src="../uploads/<?= htmlspecialchars($row['bukti']) ?>" alt="Bukti">
                                <?php else: ?>
                                    Belum Upload
                                <?php endif; ?>
                            </td>
                            <td><span class="badge bg-<?= $row['status'] == 'Menunggu' ? 'warning' : 'success' ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span></td>
                            <td><?= date("d-m-Y H:i", strtotime($row['created_at'])) ?></td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada transaksi.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
