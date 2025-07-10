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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($data['judul']); ?> - Detail Film</title>
  <link rel="stylesheet" href="/Style/home.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <link
    href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
    rel="stylesheet" />
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
  <nav class="navbar navbar-expand-lg fixed-top shadow-lg" style="background-color: yellow">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold m-3" href="#">Nonton Skuy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav gap-3">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="tayang.php">Sedang Tayang</a></li>
          <li class="nav-item"><a class="nav-link" href="populer.php">Popular</a></li>
          <li class="nav-item"><a class="nav-link" href="marchandise.php">Merchandise</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container py-5">
    <h1 class="text-center mb-4"><?php echo strtoupper(htmlspecialchars($data['judul'])); ?></h1>
    <div class="row">
      <div class="col-md-5">
        <img src="admin/uploads/<?php echo htmlspecialchars($data['poster']); ?>"
          alt="Poster <?php echo htmlspecialchars($data['judul']); ?>"
          class="img-fluid rounded shadow" />

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
      <a href="checkout.php?id=<?php echo $data['id_movie']; ?>" class="btn btn-beli">Beli Tiket</a>

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