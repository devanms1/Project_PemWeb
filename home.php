<?php
  include 'koneksi.php';
  $result = $conn->query("SELECT * FROM products");
  while ($row = $result->fetch_assoc()) {
      echo "<div>";
      echo "<h3>" . $row['nama_produk'] . "</h3>";
      echo "<p>Rp " . number_format($row['harga']) . "</p>";
      echo "<img src='images/" . $row['gambar'] . "' width='150'>";
      echo "</div>";
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda - Nonton Skuy</title>
    <link rel="stylesheet" href="./Style/home.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php
        include 'koneksi.php';
      $result = $conn->query("SELECT * FROM products");
      while ($row = $result->fetch_assoc()) {
          echo "<div>";
          echo "<h3>" . $row['nama_produk'] . "</h3>";
          echo "<p>Rp " . number_format($row['harga']) . "</p>";
          echo "<img src='images/" . $row['gambar'] . "' width='150'>";
          echo "</div>";
      }
      ?>


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
              <a class="nav-link" href="./populer.php">Popular</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="marchandise.php">Merchandise</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- <section class="carousel-section">
      <div class="carousel-container">
        <div class="carousel-wrapper">
          <img src="1.jpeg" alt="Slide 1" class="carousel-image active" />
          <img src="1.jpeg" alt="Slide 2" class="carousel-image" />
          <img src="1.jpeg" alt="Slide 3" class="carousel-image" />
        </div>
        <button class="carousel-arrow prev-arrow">&lt;</button>
        <button class="carousel-arrow next-arrow">&gt;</button>
        <div class="carousel-indicators">
          <span class="dot active" data-index="0"></span>
          <span class="dot" data-index="1"></span>
          <span class="dot" data-index="2"></span>
        </div>
      </div>
    </section> -->

    <!-- Carousel Bootstrap Ditengah dan Lebarnya Diatur -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10" style="margin-top: 10em">
          <div
            id="carouselExampleCaptions"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
            </div>

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="./Poster/Best-Movie-Ticket-Booking-Apps-in-India-768x431.jpg"
                  class="d-block w-100 rounded-3"
                  alt="Deadpool"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Diskom Besar</h5>
                  <p>Dapatkan Diskon Besar Besaran</p>
                </div>
              </div>
              <div class="carousel-item">
                <img
                  src="./Assets/Film Banyak.jpeg"
                  class="d-block w-100 rounded-3"
                  alt="Dr. Strange"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Kumpulan Film Yang Menarik</h5>
                  <p>
                    Ayo Nonton FIlm Dengan Berbagai Film Yang Menarik Dan Karya
                    Anak Bangsa
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <img
                  src="./Poster/traveloka-8.jpg"
                  class="d-block w-100 rounded-3"
                  alt="Kraven"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Diskon 50%</h5>
                  <p>Diskon Yang Meriah</p>
                </div>
              </div>
            </div>

            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="button">
      <a href="./tayang.html">
      <button
        type="button"
        class="btn btn-primary btn-lg gap-2 d-flex mx-auto mt-5"
      >
        Tonton Sekarang

      </button>
      </a>
    </div>

    <div class="info popup" id="popup" data-aos="fade-up" data-aos-delay="200">
      <div class="popup-content">
        <h1>Selamat datang di Nonton Skuy</h1>
        <h3>Berikut adalah film yang sedang tayang di bioskop</h3>
      </div>
    </div>
    <div
      class="popular popup"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="200"
    >
      <div
        class="row row-cols-1 row-cols-md-4 g-4 mt-1 d-flex row-space-around popup-content"
      >
        <div
          class="card m-2"
          style="
            width: 18rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
          "
        >
          <img
            src="./Poster/Jumbo.jpeg"
            class="card-img-top img-fluid zoom-effect"
            alt="..."
            style="height: 375px; object-fit: cover"
          />
          <div class="card-body">
            <h5 class="card-title">Jumbo</h5>
            <p class="card-text">
              Film Jumbo mengisahkan seorang anak yatim piatu berusia 10 tahun
              bernama Don. Ia sering diremehkan karena memiliki tubuh yang
              besar.
            </p>
          </div>
        </div>

        <div
          class="card m-2"
          style="
            width: 18rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
          "
        >
          <img
            src="./Poster/Suzume.jpeg"
            class="card-img-top img-fluid zoom-effect"
            alt="..."
            style="object-fit: cover"
          />
          <div class="card-body">
            <h5 class="card-title">Suzume</h5>
            <p class="card-text">
              Suzume bertemu pria misterius yang memintanya menutup pintu di
              reruntuhan. Ternyata, pintu-pintu itu membawa bencana. Ia pun
              berkeliling Jepang untuk menutup pintu-pintu tersebut.
            </p>
          </div>
        </div>

        <div
          class="card m-2"
          style="
            width: 18rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
          "
        >
          <img
            src="./Poster/Jujutsu.jpg"
            class="card-img-top img-fluid zoom-effect"
            alt="..."
            style="height: 370px; object-fit: cover"
          />
          <div class="card-body">
            <h5 class="card-title">Jujutsu Kaisen</h5>
            <p class="card-text">
              Jujutsu Kaisen mengisahkan Yuji Itadori, siswa SMA yang awalnya
              menjalani hidup santai bersama klub gaib. Namun, setelah menemukan
              benda terkutuk, ia terseret ke dunia kutukan.
            </p>
          </div>
        </div>

        <div
          class="card m-2"
          style="
            width: 18rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
          "
        >
          <img
            src="./Poster/Avanger.jpg"
            class="card-img-top img-fluid zoom-effect"
            alt="..."
            style="height: 375px; object-fit: cover"
          />
          <div class="card-body">
            <h5 class="card-title">Avengers: Endgame</h5>
            <p class="card-text">
              Pertarungan dalam Avengers: Endgame menjadi pertarungan
              penghabisan para Avengers untuk melawan musuh terkuat mereka,
              Thanos.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div
      class="row"
      style="margin-top: 10em"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="400"
    >
      <div class="col-6">
        <div class="keterangan pt-4" style="margin-left: 4em">
          <h1>Apakah Kalian Tahu ??</h1>
          <p class="pt-4">
            Menonton di bioskop memberikan pengalaman yang berbeda dibanding
            menonton di rumah. Suara yang menggelegar, layar super besar,
            suasana gelap yang fokus, serta momen bersama teman atau keluarga
            menjadikan aktivitas ini seru dan menyenangkan. Ditambah lagi dengan
            popcorn hangat dan suasana yang mendukung, nonton bioskop jadi
            hiburan favorit untuk melepas penat dan menikmati cerita dari film
            dengan lebih mendalam.
          </p>
        </div>
      </div>
      <div class="col-6">
        <img
          src="./Assets/Suasana Bioskop.jpg"
          alt=""
          style="width: 500px"
          class="rounded-5"
        />
      </div>
    </div>

    <div
      class="row popup"
      style="margin-top: 10em"
      data-aos="fade-up"
      data-aos-delay="700"
    >
      <div class="col-6">
        <div class="keterangan" style="margin-left: 4em">
          <img
            src="./Poster/OIP.jpeg"
            alt=""
            style="width: 500px"
            class="rounded-5"
          />
        </div>
      </div>
      <div class="col-6 pt-5">
        <h1>Asal Usul Bioskop</h1>
        <p class="pt-4">
          Bioskop pertama kali muncul pada akhir abad ke-19 setelah penemuan
          teknologi film. Pada tahun 1895, Lumière bersaudara dari Prancis
          mengadakan pemutaran film publik pertama menggunakan proyektor. Sejak
          saat itu, bioskop berkembang menjadi tempat hiburan populer di seluruh
          dunia.
        </p>
      </div>
    </div>

    <div
      class="container-fluid"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="700"
      style="margin-top: 15em"
    >
      <h1 style="text-align: center; font-weight: bold; margin-bottom: 1em">
        Popular
      </h1>
      <div class="scrolling-wrapper">
        <div class="anime-card">
          <img src="./Poster_Film/Five Friends (2024).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Five Friends</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Poster_Film/Miracle in Cell No_ 7.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Miracke In Cell</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Poster_Film/Warkopdki.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Warkop DKI</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/Pocong_Kesetanan.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Pocong Kesetanan</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/Pertaruhan.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Pertaruhan</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/One_Piece.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">One Piece</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/Red.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">One Piece Red</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/Interstelar.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Interstelar</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/Wanitaahlineraka.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Wanita Neraka</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Poster_Film/agak Laen.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Agak Laen</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="container-fluid mt-5"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="700"
    >
      <h1 style="text-align: center; font-weight: bold">Animasi</h1>
      <div class="scrolling-wrapper">
        <div class="anime-card">
          <img src="./Anime/download (3).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Jujutsu Kaisen 0</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Anime/download (4).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Grave Of the Fireflesh</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Anime/download (5).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Totoro</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Anime/download (6).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Dandadan</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Anime/download (7).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Bem</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Anime/download (8).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">My Hero Academia WHM</p>
          </div>
        </div>
        <div class="anime-card">
          <img
            src="./Anime/Dragon Ball Super_ Broly movie poster.jpeg"
            alt=""
          />
          <div class="p-2">
            <p class="mb-0">Dragon Ball Super</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Anime/myhero.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">my Hero Academia</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="container-fluid mt-5"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="700"
    >
      <h1 style="text-align: center; font-weight: bold">Romance</h1>
      <div class="scrolling-wrapper">
        <div class="anime-card">
          <img src="./Romance/Bukan Cinderella Movie.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Bukan Cinderella</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Romance/download (3).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Asal Kau Bahagia</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Romance/download (4).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Laut Tengah</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Romance/download (5).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Keluarga Cemara 1</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Romance/Keluarga Cemara 2.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Keluarga Cemara 2</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Romance/MenantuMaut.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Norna</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Romance/aaa.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Ipar adalah Maut</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Romance/AADC.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Ada apa dengan cinta</p>
          </div>
        </div>
      </div>
    </div>
    <div
      class="container-fluid mt-5"
      id="popup"
      data-aos="fade-up"
      data-aos-delay="700"
    >
      <h1 style="text-align: center; font-weight: bold">Horror</h1>
      <div class="scrolling-wrapper">
        <div class="anime-card">
          <img src="./Horor/Bloodlust Beauty  🇮🇩.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Simanis Jembatan Ancol</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Horor/download (3).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Kalian Pantas Mati</p>
          </div>
        </div>

        <div class="anime-card">
          <img src="./Horor/download (4).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Pengabdi Setan</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/download (5).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Mangku jiwo</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/download (6).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Sinden</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/Film_ DreadOut (2019).jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">DreadOut</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/Losmen Melati.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Losmen Melati</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/Qodrat.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Qodrat</p>
          </div>
        </div>
        <div class="anime-card">
          <img src="./Horor/マカブル・永遠の血族.jpeg" alt="" />
          <div class="p-2">
            <p class="mb-0">Rumah Dara</p>
          </div>
        </div>
      </div>
    </div>

    <div class="info popup" data-aos="fade-up" data-aos-delay="200">

      <h3 class="mb-3" style="text-align: center; font-weight: bold">
        Lokasi Kami
      </h3>
      <div class="ratio ratio-16x9" style="margin-bottom: 15em">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1978.296673454206!2d109.2052394845294!3d-7.399378317534284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f099a52e647%3A0x3d03d120010cf36a!2sRAJENDRA%20BABERSHOP!5e0!3m2!1sid!2sid!4v1746803683962!5m2!1sid!2sid"
          width="100"
          height="10"
          style="border: 0; border-radius: 2em"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          width="100"
          height="100"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        >
        </iframe>
      </div>
    </div>

    <footer
      class="footer text-white py-4 shadow"
      style="background-color: yellow; color: black"
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

    <!-- <script>
        const wrapper = document.querySelector(".carousel-wrapper");
        const images = document.querySelectorAll(".carousel-image");
        const prev = document.querySelector(".prev-arrow");
        const next = document.querySelector(".next-arrow");
        const dots = document.querySelectorAll(".dot");
        let index = 0;

        function showSlide(i) {
          index = (i + images.length) % images.length;
          wrapper.style.transform = `translateX(-${index * 100}%)`;
          dots.forEach((dot) => dot.classList.remove("active"));
          dots[index].classList.add("active");
        }

        prev.addEventListener("click", () => showSlide(index - 1));
        next.addEventListener("click", () => showSlide(index + 1));
        dots.forEach((dot, i) => {
          dot.addEventListener("click", () => showSlide(i));
        });

        showSlide(index);
      </script> -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000,
        once: true,
      });
    </script>
  </body>
</html>
