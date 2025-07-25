<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jumbo Movie</title>
    <link rel="stylesheet" href="./Style/page-jumbo.css" />
  </head>
  <style>
    .btn-jam {
      background-color: transparent; /* Kuning terang */
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      color: #000;
      border-radius: 8px;
      transition: 0.3s;
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
  <body>
    <header>
      <div class="navbar">
        <h1>Nonton Skuy</h1>
        <nav>
          <ul>
            <li><a href="home.html" class="active">Home</a></li>
            <li><a href="#">Jadwal Film</a></li>
            <li><a href="beranda_bioskop.html">Populer</a></li>
            <li><a href="marchandise.html">Merchandise</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="container">
      <h1>Penjagal Iblis</h1>
      <div class="movie-content">
        <div class="poster">
          <img
            src="https://awsimages.detik.net.id/community/media/visual/2025/05/02/poster-film-penjagal-iblis-dosa-turunan-1746169275758.webp?w=600&q=90"
            alt="Poster Jumbo"
          />
        </div>
        <div class="trailer">
          <iframe
            width="100%"
            height="315"
            src="https://youtu.be/sC5-sFUm2I0?si=Zw8k7DOXQI2eePBg"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          >
          </iframe>
        </div>
      </div>

      <div class="details">
        <h2>Detail Film</h2>
        <ul>
          <li><strong>Director:</strong> Tomi Dewo</li>
          <li>
            <strong>Starring:</strong> Niken Anjani, Martino Lio, Kiki Narendra
          </li>
          <li><strong>Censor Rating:</strong> D-17</li>
          <li><strong>Genre:</strong> Horor</li>
          <li><strong>Language:</strong> Bahasa Indonesia</li>
          <li><strong>Subtitle:</strong> Indonesia</li>
          <li><strong>Duration:</strong> 1j 39m</li>
        </ul>

        <div class="sinopsis">
          <h3>Sinopsis</h3>
          <p>
            Kegemparan melanda ketika pembunuhan berantai terjadi dan mengincar
            jantung para pemuka agama. Sebuah keluarga pun tewas dibunuh dengan
            cara brutal. Seorang gadis dituduh sebagai pelakunya. Namun,
            kebenaran yang lebih mengerikan siap menyeruak.
          </p>
        </div>
      </div>
      <div class="container text-center">
        <h2 class="mb-4" style="font-weight: bold">Jam Tayang</h2>
        <div
          class="showtimes-box d-inline-block p-4 rounded"
          style="background-color: transparent"
        >
          <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
            <button class="btn btn-jam">12:30</button>
            <button class="btn btn-jam">15:00</button>
            <button class="btn btn-jam">17:45</button>
            <button class="btn btn-jam">20:15</button>
          </div>
          <button class="btn btn-beli shadow-pop">Beli Tiket</button>
        </div>
      </div>
    </div>

    <footer
      class="footer text-white py-4"
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

    <script>
      const express = require("express");
      const app = express();
      const path = require("path");

      // Serve static files (CSS, Images)
      app.use(express.static(path.join(__dirname, "public")));

      // Route to serve HTML
      app.get("/", (req, res) => {
        res.sendFile(path.join(__dirname, "public", "index.html"));
      });

      // Start server
      const PORT = 3000;
      app.listen(PORT, () => {
        console.log(`Server berjalan di http://localhost:${PORT}`);
      });
    </script>
  </body>
</html>
