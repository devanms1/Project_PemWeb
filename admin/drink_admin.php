<?php
// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "db_bioskop");

// Cek koneksi
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name  = $koneksi->real_escape_string($_POST['name']);
  $price = (int)$_POST['price'];

  // Cek apakah file diunggah
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileName     = basename($_FILES['image']['name']);
    $tmp          = $_FILES['image']['tmp_name'];
    $fileType     = mime_content_type($tmp);
    $uploadDir    = 'uploads/';
    $uploadPath   = $uploadDir . time() . '_' . $fileName;

    // Validasi tipe file gambar
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
    if (!in_array($fileType, $allowedTypes)) {
      echo "Tipe file tidak didukung. Harus JPG/PNG/WebP.";
      exit;
    }

    // Pastikan folder uploads/ ada
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    // Proses simpan gambar
    if (move_uploaded_file($tmp, $uploadPath)) {
      $stmt = $koneksi->prepare("INSERT INTO drinks (name, price, image) VALUES (?, ?, ?)");
      $stmt->bind_param("sis", $name, $price, $uploadPath);
      $stmt->execute();
      $stmt->close();

      echo "<script>alert('Minuman berhasil ditambahkan!'); window.location='admin_drink.php';</script>";
    } else {
      echo "Gagal upload gambar.";
    }
  } else {
    echo "Gambar tidak dipilih atau error saat upload.";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Tambah Minuman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">Input Produk Minuman 🍹</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Nama Minuman</label>
        <input type="text" class="form-control" name="name" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" class="form-control" name="price" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" class="form-control" name="image" accept="image/*" required/>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>

    <hr class="my-5" />

    <h4 class="mb-3">Data Minuman yang Sudah Diinput</h4>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php
        $result = $koneksi->query("SELECT * FROM drinks ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
          echo '
            <div class="col">
              <div class="card h-100">
                <img src="'.$row['image'].'" class="card-img-top" style="height:180px; object-fit:cover;" />
                <div class="card-body">
                  <h5 class="card-title">'.$row['name'].'</h5>
                  <p class="card-text text-danger fw-bold">Rp '.number_format($row['price'], 0, ',', '.').'</p>
                </div>
              </div>
            </div>';
        }
      ?>
    </div>
  </div>
</body>
</html>
