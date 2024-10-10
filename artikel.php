<?php
include 'koneksi.php';
$sql = "SELECT narasumber, judul_berita, isi_berita, foto FROM berita"; 
$result = $conn->query($sql);
if ($result === false) {
  echo "Query error: " . $conn->error;  // Untuk debugging
} elseif ($result->num_rows === 0) {
  echo "Tidak ada berita yang ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>OMAH LAUNDRY PRAPEN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Load jQuery dan OwlCarousel -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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

        .section-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .berita-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            overflow: hidden;
            width: 100%;
        }

        .berita-box img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .berita-box h6 {
            font-size: 20px;
            font-weight: bold;
            color: #f17122;
            margin-bottom: 10px;
            text-align: center;
        }

        .berita-box p {
            font-size: 16px;
            color: #333;
            text-align: justify;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .berita-box {
                margin: 10px 5px;
            }

            .berita-box img {
                height: 200px;
            }
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

    <!-- Header -->
    <header id="header" class="fixed-top" style="background-color: #FFBB70;">
        <div class="container d-flex align-items-center ">
            <h1 class="logo me-auto"><a href="customer.php" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #fff;">OMAH LAUNDRY PRAPEN</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li class="dropdown">
                        <a href="#"><span>Home</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="index.php">Beranda</a></li>
                            <li><a href="artikel.php">Berita</a></li>
                            <li><a href="sosmed.php">Sosial Media</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <br><br><br><br>

    
    <script>
    $(document).ready(function(){
        $(".berita-carousel").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 2,   // Menampilkan 2 berita per tampilan
        loop: true, // Membuat loop pada carousel
        margin: 30, // Jarak antar elemen carousel
        nav: true,  // Menampilkan navigasi
        dots: true, // Menampilkan dots untuk navigasi
        responsive: {
            0: {
            items: 1  // Pada layar kecil (mobile), hanya tampil 1 berita
            },
            600: {
            items: 2  // Pada layar sedang, tampil 2 berita
            }
        }
        });
    });
    </script>

    <!-- Berita Section -->
    <section id="berita" class="berita">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Berita</h2>
            </div>

            <!-- Slider berita -->
            <div class="berita-carousel owl-carousel owl-theme">
                <!-- Menampilkan berita dari database -->
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($berita = $result->fetch_object()): ?>
                        <div class="berita-box shadow p-4 bg-white rounded">
                            <div>
                                <img src="./admin/assets/img/<?php echo $berita->foto; ?>" style="width: 800px; height: 400px;" alt="img">
                            </div>
                            <div style="text-align: center">
                                <h6 class="heading" style="text-align: center;"><?php echo $berita->judul_berita; ?></h6>
                                <div class="meta">
                                    <i class="fa fa-user"></i> <a href="#"><?php echo $berita->narasumber; ?></a>
                                </div>
                                <p style="text-align: justify; margin: 0 20px;"><?php echo nl2br($berita->isi_berita); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p style="text-align: center; color: #000000;">Belum ada berita yang tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- JS Scripts -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>