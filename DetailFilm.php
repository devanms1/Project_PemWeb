<?php
$koneksi = new mysqli("localhost", "root", "", "db_bioskop");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
if ($id === 0) {
    echo "<script>alert('ID film tidak valid!');window.location.href='tayang.php';</script>";
    exit;
}

$query = "SELECT m.*, GROUP_CONCAT(j.jam SEPARATOR ',') AS jam_tayang 
          FROM movies m
          LEFT JOIN jam_tayang j ON m.id_movie = j.id_movie
          WHERE m.id_movie = $id
          GROUP BY m.id_movie";

$result = $koneksi->query($query);
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>alert('Film tidak ditemukan!');window.location.href='tayang.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo htmlspecialchars($data['judul']); ?> - Detail Film</title>
  <link rel="stylesheet" href="./Style/page-jumbo.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .btn-jam {
      background-color: transparent;
      border: 2px solid #ffd600;
      padding: 10px 20px;
      font-weight: bold;
      color: #000;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-jam:hover {
      background-color: #ffd600;
    }
    .btn-beli {
      background-color: #ffd600;
      color: #000;
      border: none;
      padding: 14px 40px;
      font-size: 1.2rem;
      font-weight: bold;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-beli:hover {
      background-color: #ffca28;
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <header>
    <div class="navbar bg-warning p-3 d-flex justify-content-between align-items-center">
      <h2 class="m-0">🎬 Nonton Skuy</h2>
      <nav>
        <ul class="d-flex list-unstyled gap-4 m-0">
          <li><a href="home.php" class="text-dark fw-bold text-decoration-none">Home</a></li>
          <li><a href="tayang.php" class="text-dark text-decoration-none">Jadwal Film</a></li>
          <li><a href="populer.php" class="text-dark text-decoration-none">Populer</a></li>
          <li><a href="marchandise.php" class="text-dark text-decoration-none">Merchandise</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container py-5">
    <h1 class="text-center mb-4"><?php echo strtoupper(htmlspecialchars($data['judul'])); ?></h1>
    <div class="row">
      <div class="col-md-5">
        <img src="uploads/<?php echo htmlspecialchars($data['poster']); ?>" alt="Poster <?php echo htmlspecialchars($data['judul']); ?>" class="img-fluid rounded shadow" />
      </div>
      <div class="col-md-7">
        <h3>Detail Film</h3>
        <ul class="list-unstyled">
          <li><strong>Judul:</strong> <?php echo htmlspecialchars($data['judul']); ?></li>
          <li><strong>Genre:</strong> <?php echo htmlspecialchars($data['kategori']); ?></li>
          <li><strong>Rilis:</strong> <?php echo htmlspecialchars($data['rilis']); ?></li>
          <li><strong>Durasi:</strong> 102 Menit</li>
          <li><strong>Bahasa:</strong> Indonesia</li>
          <li><strong>Subtitle:</strong> Tidak Ada</li>
          <li><strong>Rating Usia:</strong> SU</li>
        </ul>

        <h4 class="mt-4">Sinopsis</h4>
        <p><?php echo nl2br(htmlspecialchars($data['sinopsis'])); ?></p>
      </div>
    </div>

    <div class="text-center mt-5">
      <h2 class="mb-4">Jam Tayang</h2>
      <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
        <?php
          $jamList = explode(',', $data['jam_tayang']);
          foreach ($jamList as $jam) {
              echo "<button class='btn btn-jam'>" . trim($jam) . "</button>";
          }
        ?>
      </div>
      <a href="#" class="btn btn-beli">Beli Tiket</a>
    </div>
  </div>

  <footer class="text-center py-4 mt-5" style="background-color: yellow;">
    <p class="mb-0 text-dark">&copy; 2025 NontonSkuy.com</p>
    <p class="text-muted small mb-0">
      Nonton Skuy adalah solusi praktis untuk mencari dan memesan tiket film favoritmu.
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>