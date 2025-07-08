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
      <h1>The Batman Part II</h1>
      <div class="movie-content">
        <div class="poster">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSj4vl5ZoV1x1Bw2IURMatBnhoHBLUvGc-yzG_DNW8BTES9cYXSKJCUacUcFyuNFGrrRgc&usqp=CAU"
            alt="Poster Jumbo"
          />
        </div>
        <div class="trailer">
          <iframe
            width="100%"
            height="315"
            src="https://youtu.be/_8xDtjlR3ek?si=taojUG2dgVWSvqKj"
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
          <li><strong>Director:</strong> Mat Reeves</li>
          <li>
            <strong>Starring:</strong> Robert pattinson, Zoe Kravitz, Paul Dano
          </li>
          <li><strong>Censor Rating:</strong> PG-13</li>
          <li><strong>Genre:</strong> action</li>
          <li><strong>Language:</strong> Bahasa Inggris</li>
          <li><strong>Subtitle:</strong> Indonesia</li>
          <li><strong>Duration:</strong> 2j 56m</li>
        </ul>

        <div class="sinopsis">
          <h3>Sinopsis</h3>
          <p>
            Ketika Riddler, seorang pembunuh berantai yang sadis mulai membunuh
            tokoh-tokoh politik penting di Gotham, Batman dituntut untuk
            menyelidiki korupsi tersembunyi di kota itu dan mempertanyakan
            keterlibatan keluarganya.
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
