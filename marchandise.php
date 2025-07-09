<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marchandise</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./Style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg fixed-top shadow-lg"
      style="background-color: yellow"
    >
      <div class="container-fluid">
        <a class="navbar-brand fw-bold m-3" href="#">Nonton Skuy</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNavDropdown"
        >
          <ul class="navbar-nav gap-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tayang.php">Sedang Tayang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="populer.php">Popular</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="marchandise.php">Merchandise</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Navbar End -->
    <div
      class="d-flex justify-content-center align-items-center full-height"
      style="margin-bottom: 4em"
    >
      <h1 class="fw-bolder fs-3" style="margin-top: 7em">Package & Giftset</h1>
    </div>

    <!-- Cpontent -->
    <div class="row row-cols-1 row-cols-md-4 g-4 d-flex row-space-around">
      <div class="col">
        <a href="drink.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Drink</div>
            <img src="./Assets/Drink.jpg" class="card-img-top" alt="Minuman" />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="snack.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Snack</div>
            <img src="./Assets/Snack.jpg" class="card-img-top" alt="Snack" />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="keychan.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Keychan</div>
            <img
              src="./Assets/Keychan.jpg"
              class="card-img-top"
              alt="Gantungan Kunci"
            />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="poster_film.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Poster Film</div>
            <img
              src="./Assets/kaguyasamamanga.jpg"
              class="card-img-top"
              alt="Poster Film"
            />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="hadiah.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Hadiah</div>
            <img src="./Assets/kadp.jpg" class="card-img-top" alt="Kado" />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="figur.php">
          <div class="card card-custom text-center">
            <div class="card-overlay">Figure</div>
            <img src="./Assets/Figure.jpeg" class="card-img-top" alt="Figure" />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <div class="card card-custom text-center">
            <div class="card-overlay">Sewa Bantal</div>
            <img src="./Assets/miaw.png" class="card-img-top" alt="Bantal" />
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <div class="card card-custom text-center">
            <div class="card-overlay">Sewa Selimut</div>
            <img
              src="./Assets/selimut.jpeg"
              class="card-img-top"
              alt="Selimut"
            />
          </div>
        </a>
      </div>
    </div>
    <!-- Content End -->

    <footer
      class="footer text-white py-4 shadow"
      style="background-color: yellow; color: black; margin-top: 10em;"
    >
      <div class="container text-center">
        <div class="social-icons mb-3">
          <a href="#" class="text-white me-3"
            ><i class="fab fa-facebook"></i
          ></a>
          <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mb-2" style="color: black">Copyright ©2025 Nonton Skuy.com</p>
        <div class="footer-links mb-3" style="text-decoration: none">
          <a href="#" class="text-orange mx-2">About Us</a>
          <a href="#" class="text-orange mx-2">Privacy Policy</a>
          <a href="#" class="text-orange mx-2">Contact Us</a>
          <a href="#" class="text-orange mx-2">Movie Updates</a>
          <a href="#" class="text-orange mx-2">All Movies</a>
        </div>
        <p class="text-muted small mb-0">
          Nonton Skuy hadir sebagai solusi praktis dan cepat bagi kamu yang
          ingin menemukan film favorit tanpa ribet — cukup satu klik, dan
          seluruh pilihan tayangan terbaik langsung tersedia di genggamanmu.
        </p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
