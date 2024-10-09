<?php
include 'koneksi.php';
$sql = "SELECT nama, isi_review, rating FROM review"; 
$result = $conn->query($sql);
if ($result === false) {
  echo "Query error: " . $conn->error;  // Untuk debugging
} elseif ($result->num_rows === 0) {
  echo "Tidak ada testimoni yang ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>OMAH LAUNDRY PRAPEN</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    /* Style untuk gelombang */
    .waves-container {
      position: absolute;
      width: 100%;
      height: auto;
      bottom: 0;
      z-index: -1;
    }

    .waves {
      width: 100%;
      height: auto;
    }

    #navbar .nav-link.active {
      color: #DC6B19 !important;
    }
  </style>
</head>

<body>
  <!-- Gelombang -->
  <div class="waves-container">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="white" />
      </g>
    </svg>
  </div>
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;">Omah Laundry Prapen</a></h1>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
            <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
            <li><a class="nav-link scrollto" href="#excess">Keunggulan</a></li>
            <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li>
            <li><a class="nav-link scrollto" href="#testimoni">Testimoni</a></li>
            <!-- <li><a class="nav-linl scrollto" href="#artikel">Berita</a></li> -->
            <li class="dropdown">
              <a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="artikel.php">Berita</a></li>
                <li><a href="sosmed.php">Sosial Media</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#lokasi">Lokasi</a></li>
            <li class="dropdown">
              <a href="#"><span>Pesan</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="customer.php">Pesan</a></li>
                <li><a href="lacak.php">Lacak</a></li>
              </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Omah Laundry Prapen</title>
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <style>
        .whatsapp-icon,
        .instagram-icon {
          font-size: 35px;
        }

        .whatsapp-icon {
          color: green;
        }

        .instagram-icon {
          color: #405DE6;
        }

        .social-link {
          margin-left: 10px;
          margin-top: 15px;
        }
      </style>
    </head>

    <body>
      <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h1>Tentang Omah Laundry Prapen</h1>
              <h2>Omah Laundry Prapen adalah usaha jasa laundry yang berlokasi di Kota Surabaya.</h2>
              <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="#tentang" class="btn-get-started scrollto">Get Started</a>
                <!-- Tautan WhatsApp -->
                <a href="https://wa.me/6285259380790" class="social-link">
                  <i class="fab fa-whatsapp whatsapp-icon"></i>
                </a>
                <!-- Tautan Instagram -->
                <a href="https://www.instagram.com/omahlaundryprapen" class="social-link">
                  <i class="fab fa-instagram instagram-icon"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/pic1.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section>
    </body>

</html>
<!-- End Hero -->

<!-- ======= About Us Section ======= -->
<section id="tentang" class="tentang">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
        <img src="assets/img/laundry3.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
        <br><br>
        <h3>Cerita Tentang Omah Laundry Prapen</h3>
        <p class="fst-italic">
          Selamat datang di Layanan Laundry RPK Prapen, Surabaya mitra terpercaya di Rumah Padat Karya, Prapen. Kami menawarkan pengalaman layanan laundry tak tertandingi dengan fokus pada personalisasi, kualitas terjamin, efisiensi, dan harga terjangkau. Tim profesional kami tidak hanya menjaga kebersihan pakaian Anda, tetapi juga memberikan layanan harian dan setrika saja dengan dedikasi tinggi. Kami berkomitmen untuk memberikan pengembalian cepat tanpa mengorbankan kualitas. Hubungi kami sekarang untuk merasakan layanan terbaik di RPK Prapen, di mana kenyamanan dan kebersihan bertemu dalam harmoni.
        </p>
      </div>
    </div>
</section>
<!-- End About Us Section -->

<!-- ======= Kelebihan ======= -->
<section id="excess" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Kelebihan</h2>
      <p>
        Layanan Laundry RPK Prapen menonjol dengan personalisasi, kualitas terjamin, efisiensi, dan harga terjangkau
      </p>
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class="bx bxl-dribbble"></i></div>
          <h4><a href="customer.php">Pemesanan</a></h4>
          <p>
            Pelanggan dapat memesan layanan laundry melalui website kami dengan mudah. Proses pemesanan instan memungkinkan Anda menikmati layanan, sambil memastikan kenyamanan untuk memenuhi kebutuhan pakaian Anda.
          </p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-file"></i></div>
          <h4><a href="">Kepastian Jadwal</a></h4>
          <p>
            Pelanggan dapat memilih waktu sesuai kebutuhan, dan layanan laundry kami akan menyesuaikan jadwal pengambilan dan pengantaran sesuai permintaan pelanggan untuk memenuhi kebutuhan dengan pelayanan yang optimal.
          </p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-tachometer"></i></div>
          <h4><a href="harga.php">Harga</a></h4>
          <p>
            Pelanggan memiliki kemampuan untuk meninjau daftar harga setiap layanan dan memilih opsi yang sesuai dengan anggaran mereka. Praktik ini membantu mencegah ketidakjelasan atau adanya biaya tersembunyi.
          </p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-layer"></i></div>
          <h4><a href="">Keamanan</a></h4>
          <p>
            Keamanan informasi pelanggan, termasuk alamat, nomor telepon, dan rincian pembayaran, menjadi prioritas utama kami untuk menjaga privasi dengan cermat dan estetis.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End kelebihan Section -->

<!-- ======= Gallery Section ======= -->
<style>
  .portfolio-item {
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }

  .portfolio-img {
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px;
  }

  .portfolio-img img {
    width: auto;
    height: 100%;
    min-width: 100%;
    object-fit: cover;
  }

  .portfolio-info {
    padding: 15px;
    background-color: white;
    border-radius: 0 0 15px 15px;
  }

  .portfolio-item:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .portfolio-item:hover .portfolio-img img {
    transform: scale(1.1);
  }

  #portfolio-flters li {
    cursor: pointer;
    margin: 0 10px;
    padding: 10px 20px;
    border-radius: 50px;
    background-color: #fff;
    color: #666;
    display: inline-block;
    transition: all 0.3s ease-in-out;
  }

  #portfolio-flters li:hover,
  #portfolio-flters li.filter-active {
    background-color: #007bff;
    color: #ffffff;
  }
</style>
<section id="gallery" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery</h2>
    </div>

    <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">All</li>
      <li data-filter=".filter-app">Cuci</li>
      <li data-filter=".filter-card">Setrika</li>
    </ul>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri 2.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 1</p>
          <a href="assets/img/galeri/galeri 2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link">
            <i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri 3.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 2</p>
          <a href="assets/img/galeri/galeri 4 (1).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri 4 (1).jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 3</p>
          <a href="assets/img/galeri/galeri 4 (1).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri 5.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 4</p>
          <a href="assets/img/galeri/galeri 5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri6.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 5</p>
          <a href="assets/img/galeri/galeri6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-img">
          <img src="assets/img/galeri/galeri7.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 6</p>
          <a href="assets/img/galeri/galeri7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika2.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 7</p>
          <a href="assets/img/galeri/seterika2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika4.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 8</p>
          <a href="assets/img/galeri/seterika4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika5.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 9</p>
          <a href="assets/img/galeri/seterika5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika6.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 10</p>
          <a href="assets/img/galeri/seterika6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika1,.jpg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 11</p>
          <a href="assets/img/galeri/seterika1,.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-img">
          <img src="assets/img/galeri/seterika3,.jpeg" class="img-fluid" alt="" />
        </div>
        <div class="portfolio-info">
          <h4>Dokumentasi Laundry</h4>
          <p>Gambar 12</p>
          <a href="assets/img/galeri/seterika3,.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
        </div>
      </div>


    </div>
  </div>
</section>
<!-- End Galeri Section -->

<!-- ======= Review Section ======= -->

<title>Testimoni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
  .testimonial-box {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 15px;
  }
  .testimonial-box h5 {
    font-size: 18px;
    font-weight: bold;
    color: #f17122;
    margin-bottom: 10px;
  }
  .testimonial-box .rating i {
    font-size: 18px;
  }
  .testimonial-box p {
    font-size: 16px;
    color: #333;
  }
  .section-title {
    text-align: center;
    margin-bottom: 40px;
  }
</style>

<!-- Load jQuery dan OwlCarousel -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel Initialization -->
<script>
  $(document).ready(function(){
    $(".testimonial-carousel").owlCarousel({
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      items: 3,   // Menampilkan 3 testimoni per tampilan
      loop: true, // Membuat loop pada carousel
      margin: 30, // Jarak antar elemen carousel
      nav: true,  // Menampilkan navigasi
      dots: true, // Menampilkan dots untuk navigasi
      responsive: {
        0: {
          items: 1  // Pada layar kecil (mobile), hanya tampil 1 testimoni
        },
        600: {
          items: 2  // Pada layar sedang, tampil 2 testimoni
        },
        1000: {
          items: 3  // Pada layar besar, tampil 3 testimoni
        }
      }
    });
  });
</script>


<section id="testimoni" class="kontak">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Testimoni</h2>
    </div>

    <div class="testimonial-carousel owl-carousel owl-theme">
      <!-- Menampilkan testimoni dari database -->
      <?php if ($result->num_rows > 0): ?>
        <?php while ($review = $result->fetch_object()): ?>
          <div class="testimonial-box shadow p-4 bg-white rounded">
            <h5 class="text-primary"><?= htmlspecialchars($review->nama, ENT_QUOTES, 'UTF-8') ?></h5>
            <div class="rating mb-2">
              <!-- Menampilkan bintang sesuai rating -->
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="<?= $i <= $review->rating ? 'fas fa-star' : 'far fa-star' ?>" style="color: #ffcd00;"></i>
              <?php endfor; ?>
            </div>
            <p class="text-muted"><?= htmlspecialchars($review->isi_review, ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align: center; color: #000000;">Belum ada testimoni yang tersedia.</p>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- End review Section -->


<!-- ======= Location Section ======= -->
<section id="lokasi" class="kontak">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Location</h2>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="info">
          <div class="alamat">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Jl. Kyai Abdullah No.17, Prapen, Kec.Tenggilis Mejoyo, Surabaya, Jawa Timur 60299 · 0895-6312-18283</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>prapenlaundry@gmail.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+62 85259380790</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="info">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.239084272596!2d112.7519834!3d-7.313843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb21c55541d5%3A0x828f8f0a2285aeb1!2sRumah%20Padat%20Karya%20Prapen!5e0!3m2!1sen!2sid!4v1686222868665!5m2!1sen!2sid" frameborder="0" style="border: 0; width: 100%; height: 290px" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Location Section -->

<!-- Footer -->
<footer id="footer">
  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>Omah Laundry</span></strong>. 2024
    </div>
  </div>
</footer>
<!-- End Footer -->

<!-- Back to Top Button -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- End Back to Top Button -->

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>