<?php
$koneksi = new mysqli("localhost", "root", "", "db_bioskop");
if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT m.id_movie, m.judul, m.kategori, m.sinopsis, m.poster, GROUP_CONCAT(j.jam SEPARATOR ', ') AS jam_tayang
          FROM movies m
          LEFT JOIN jam_tayang j ON m.id_movie = j.id_movie
          GROUP BY m.id_movie
          ORDER BY m.rilis DESC";
$result = $koneksi->query($query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Jadwal Film Sedang Tayang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./Style/tayang.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .movie-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .badge-number {
      position: absolute;
      top: 10px;
      left: 10px;
      background: red;
      color: white;
      padding: 5px 10px;
      border-radius: 10px;
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
          <li class="nav-item"><a class="nav-link active" href="tayang.php">Sedang Tayang</a></li>
          <li class="nav-item"><a class="nav-link" href="populer.php">Popular</a></li>
          <li class="nav-item"><a class="nav-link" href="marchandise.php">Merchandise</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <div class="container mt-5 pt-5">
    <div id="carouselExampleCaptions" class="carousel slide mb-5">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./Poster/Deadpool.jpg" class="d-block w-100" alt="Deadpool" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Deadpool</h5>
            <p>Deadpool Anti Hero Yang Hebat</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./Poster/37958.jpg" class="d-block w-100" alt="Dr Strange" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Dr. Strange</h5>
            <p>Penyihir Multiverse</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="./Poster/37951 (1).jpg" class="d-block w-100" alt="Kraven" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Kraven The Hunter</h5>
            <p>Manusia Hutan Pemburu Terkuat</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Section Film Tayang -->
    <h2 class="text-center mb-4" style="background-color: yellow; padding: 20px 0;">🎬 Film Sedang Tayang Hari Ini</h2>
    <div class="row justify-content-center">
      <?php
      $no = 1;
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-10 mb-4">
          <div class="movie-card card shadow position-relative">
            <div class="badge-number"><?php echo $no++; ?></div>
            <img src="./Admin/uploads/<?php echo $row['poster']; ?>" alt="poster" />
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo htmlspecialchars($row['judul']); ?></h5>
              <p class="text-muted text-center mb-1"><strong>Genre:</strong> <?php echo ucfirst($row['kategori']); ?></p>
              <p class="small text-center"><?php echo substr($row['sinopsis'], 0, 90); ?>...</p>
              <p class="text-center small"><strong>Jam:</strong> <?php echo $row['jam_tayang']; ?></p>
              <div class="d-flex justify-content-center">
               <a href="DetailFilm.php?id=<?php echo $row['id_movie']; ?>" class="btn btn-warning btn-sm rounded-pill px-3">Lihat Detail</a>


              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer text-white py-4" style="background-color: yellow; color: black; margin-top: 5em;">
    <div class="container text-center">
      <p class="mb-2" style="color: black">Copyright ©2025 Nonton Skuy</p>
      <div class="footer-links mb-3" style="text-decoration: none">
        <a href="#" class="text-dark mx-2">About Us</a>
        <a href="#" class="text-dark mx-2">Privacy Policy</a>
        <a href="#" class="text-dark mx-2">Contact</a>
        <a href="#" class="text-dark mx-2">All Movies</a>
      </div>
      <p class="text-muted small mb-0">Nonton Skuy adalah tempat terbaik untuk menemukan jadwal film dan pengalaman menonton terbaik!</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>