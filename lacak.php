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
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background-color: #FFBB70;">
        <div class="container d-flex align-items-center ">
            <h1 class="logo me-auto"><a href="customer.php" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #fff;">OMAH LAUNDRY PRAPEN</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li class="dropdown">
                        <a href="#"><span>Home</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                    </li>
                </ul>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
    <br><br><br><br><br>

    <div class="col-md-10 mx-auto">
        <div class="card border-gray">
            <div class="card-header text-white" style="background: #ED9455;">
                Form Lacak Pemesanan
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['submit'])) {
                    $nomor_identitas = $_POST['No_Identitas'];

                    header("Location: tampilnota.php?nomor_identitas=$nomor_identitas");
                }
                ?>
                <form method="post">
                    <div class="mb-3 row">
                        <label for="No_Identitas" class="col-sm-3 col-form-label">No Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" id="No_Identitas" name="No_Identitas" placeholder="Masukkan Nomor Identitas" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" name="submit" class="btn btn-outline-primary">Lacak</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<!-- End main -->
<br><br><br>

<footer id="footer" style="background-color: #ED9455;">
    <div class="container py-4">
        <div class="text-center text-white">
            &copy; Copyright <strong>HANDAL</strong>. 2024
        </div>
    </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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