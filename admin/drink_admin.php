<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../login.php");
  exit;
}
include '../koneksi.php';

// Koneksi database (jaga-jaga kalau koneksi.php belum membuka koneksi)
$koneksi = new mysqli("localhost", "root", "", "db_bioskop");

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name      = $koneksi->real_escape_string($_POST['name']);
  $price     = (int)$_POST['price'];
  $stok      = (int)$_POST['stok'];
  $kategori  = $koneksi->real_escape_string($_POST['kategori']);
  $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);

  // Cek apakah file diunggah
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileName   = basename($_FILES['image']['name']);
    $tmp        = $_FILES['image']['tmp_name'];
    $fileType   = mime_content_type($tmp);
    $uploadDir  = 'uploads/';
    $uploadPath = $uploadDir . time() . '_' . $fileName;

    // Validasi tipe file gambar
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
    if (!in_array($fileType, $allowedTypes)) {
      echo "Tipe file tidak didukung. Harus JPG/PNG/WebP.";
      exit;
    }

    // Buat folder uploads jika belum ada
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    // Pindahkan file
    if (move_uploaded_file($tmp, $uploadPath)) {
      $stmt = $koneksi->prepare("INSERT INTO products (nama_produk, kategori, deskripsi, harga, gambar, stok) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssisi", $name, $kategori, $deskripsi, $price, $uploadPath, $stok);
      $stmt->execute();
      $stmt->close();

      echo "<script>alert('Produk berhasil ditambahkan!'); window.location='drink_admin.php';</script>";
    } else {
      echo "Gagal upload gambar.";
    }
  } else {
    echo "Gambar tidak dipilih atau error saat upload.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #fffdf0;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: #ffd700;
    }

    .navbar-brand,
    .nav-link {
      color: #000 !important;
      font-weight: 600;
    }

    .navbar-nav .nav-link:hover {
      color: #444 !important;
    }

    h2 {
      font-weight: bold;
    }

    .card-img-top {
      height: 180px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">🎟️ Admin NontonSkuy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav gap-3">
          <li class="nav-item"><a class="nav-link" href="HalamanTambah.php">🎬 Tambah Film</a></li>
          <li class="nav-item"><a class="nav-link active" href="drink_admin.php">🍿 Tambah Produk</a></li>
          <li class="nav-item"><a class="nav-link" href="RiwayatTransaksi.php">🧾 Pantau User</a></li>
          <li class="nav-item"><a class="nav-link text-danger" href="../login.php">🚪 Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container mt-5">
    <h2 class="mb-4">Input Produk 🍿🧃</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="name" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" class="form-control" name="price" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-select" name="kategori" required>
          <option value="drink">Minuman</option>
          <option value="snack">Snack</option>
          <option value="keychan">Keychan</option>
          <option value="poster_film">Poster Film</option>
          <option value="hadiah">Hadiah</option>
          <option value="figure">Figure</option>
          <option value="sewa_bantal">Sewa Bantal</option>
          <option value="sewa_selimut">Sewa Selimut</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="2"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" class="form-control" name="image" accept="image/*" required />
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>

    <hr class="my-5" />

    <h4 class="mb-3">Produk yang Sudah Diinput</h4>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php
      $result = $koneksi->query("SELECT * FROM products ORDER BY id_product DESC");
      while ($row = $result->fetch_assoc()) {
        echo '
          <div class="col">
            <div class="card h-100">
              <img src="' . htmlspecialchars($row['gambar']) . '" class="card-img-top" alt="' . htmlspecialchars($row['nama_produk']) . '" />
              <div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($row['nama_produk']) . '</h5>
                <p class="card-text">' . $row['kategori'] . ' | Stok: ' . $row['stok'] . '</p>
                <p class="card-text text-danger fw-bold">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>
  </div>

</body>

</html>