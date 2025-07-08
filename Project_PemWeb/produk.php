<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Daftar Produk</h2>
  <?php if (isset($_SESSION['nama'])): ?>
    <div class="mb-3">Selamat datang, <strong><?= $_SESSION['nama'] ?></strong></div>
  <?php endif; ?>

  <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()):
    ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="images/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['nama_produk'] ?>" style="height:250px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
            <p class="card-text">Rp <?= number_format($row['harga']) ?></p>
            <form action="checkout.php" method="post">
              <input type="hidden" name="id_product" value="<?= $row['id_product'] ?>">
              <input type="number" name="jumlah" value="1" min="1" class="form-control mb-2">
              <button type="submit" class="btn btn-primary">Beli</button>
            </form>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>
