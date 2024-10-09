<?php
include 'koneksi.php';
$query2 = "SELECT * FROM berita";
$result2 = mysqli_query($conn, $query2);

?>
<!DOCTYPE html>
<html lang="">

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

    <body>
        <!-- ======= Header ======= -->
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
                            </li>
                        </ul>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                    <!-- .navbar -->
                </div>
            </header>
            <!-- End Header -->
            <br><br><br><br>
</html>
<!-- End Hero -->

<section id="berita" class="berita">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Berita</h2>
        </div>
        <div class="flexslider basicslider" style="background-color: rgba(255, 197, 126, 0.9); color: #fff;  height: 300px; max-width: 100%; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);">
            <ul class="slides">
                <li>
                    <article style="margin-top: 50px;">
                        <p>Selamat Datang</p>
                        <h3 class="heading">Laundry Prapen</h3>
                        <p>Portal Berita Laundry Prapen</p>
                        <footer><a class="btn" href="#">Beranda</a></footer>
                    </article>
                </li>
                <li>
                    <article style="margin-top: 50px;">
                        <p>Selamat Datang</p>
                        <h3 class="heading">Laundry Prapen</h3>
                        <p>Portal Berita Laundry Prapen</p>
                        <footer>
                            <form id="whatsappForm" class="group" onsubmit="submitForm()">
                                <fieldset>
                                    <legend>Kritik & Saran:</legend>
                                    <input id="whatsappMessage" type="text" value="" placeholder="Masukkan Saran ...">
                                    <button class="fa fa-sign-in" type="submit" title="Submit"><em>Submit</em></button>
                                </fieldset>
                            </form>

                            <script>
                                function submitForm() {
                                    var message = document.getElementById('whatsappMessage').value;
                                    var phoneNumber = '+62895631218280';
                                    var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);
                                    window.open(whatsappUrl, '_blank');

                                    return false;
                                }
                            </script>

                        </footer>
                    </article>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper row3" style="margin-top: -200px;">
        <main class="hoc container clear">
            <!-- main body -->
            <article class="group btmspace-80">
    <?php
    if (isset($_GET['id_berita'])) {
        $id_berita = $_GET['id_berita'];
        $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 100%; max-width: 100%; text-align: center;">
                <img class="borderedbox inspace-10" src="./admin/assets/img/<?php echo $row['foto']; ?>" style="width: 800px; height: 400px;" alt="img">
            </div>
            <div style="flex: 1 1 100%; max-width: 100%; text-align: center;">
                <h6 class="heading" style="text-align: center;"><?php echo $row['judul_berita']; ?></h6>
                <ul class="nospace meta">
                    <li><i class="fa fa-user"></i> <a href="#"><?php echo $row['narasumber']; ?></a></li>
                </ul>
                <p style="text-align: justify; margin: 0 20px;"><?php echo nl2br($row['isi_berita']); ?></p>
                <footer class="nospace"><a class="btn" href="index.php">Kembali &raquo;</a></footer>
            </div>
        </div>
    <?php
    } else {
        echo "<p>Tidak ada berita yang dipilih.</p>";
    }
    ?>
</article>


            <hr class="btmspace-80">

            <?php
            if (isset($_GET['id_berita'])) {
                $id_berita_terpilih = $_GET['id_berita'];
            } else {
                $id_berita_terpilih = -1;
            }

            $query = "SELECT * FROM berita WHERE id_berita != '$id_berita_terpilih'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            ?>
                <ul class="nospace group overview">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <li class="one_third">
                            <article>
                                <a href="#"><img src="./admin/assets/img/<?php echo $row['foto']; ?>" alt="" style="width: 320px; height: 240px;"></a>
                                <h6 class="heading"><?php echo $row['judul_berita']; ?></h6>
                                <ul class="nospace meta">
                                    <li><i class="fa fa-user"></i> <a href="#"><?php echo $row['narasumber']; ?></a></li>
                                </ul>
                                <p><?php echo implode(' ', array_slice(explode(' ', $row['isi_berita']), 0, 10)); ?>...</p>
                                <footer class="nospace"><a class="btn" href="artikel.php?id_berita=<?php echo $row['id_berita']; ?>">Baca Selengkapnya &raquo;</a></footer>
                            </article>
                        </li>
                    <?php } ?>
                </ul>
            <?php
            } else {
                echo "<p>Tidak ada berita yang tersedia.</p>";
            }
            ?>
            <div class="clear"></div>
        </main>
    </div>

    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">
            <p class="fl_left">Copyright &copy; 2024 - Laundry Prapen</p>
            <p class="fl_right">Template by <a target="_blank" href="#" title="Free Website Templates">Laundry Prapen</a></p>
        </div>
    </div>
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>

</html>