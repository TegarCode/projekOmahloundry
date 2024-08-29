<?php
include 'koneksi.php';
$query = "SELECT * FROM kategori";
$result = mysqli_query($conn, $query);
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
</head>
<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <!-- Start Header -->
    <header id="header" class="fixed-top" style="background-color: #FFBB70;">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="customer.php" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: #fff;">OMAH LAUNDRY PRAPEN</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="dropdown">
                        <a href="#" style="color: #fff;"><span>Home</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle" style="color: #fff;"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- Start main -->
    <section class="laundry" style="background-color: #f8f9fa;">
        <div class="container py-5">
            <h2 class="text-center mb-5" style="color: #343a40;">Menu Laundry</h2>
            <div class="row justify-content-center">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-3 mb-4">
                            <div class="card border-0 shadow">
                                <img class="card-img-top rounded-circle" src="<?= './admin/assets/kategori/' . $row['foto']; ?>" alt="<?= $row['kategori']; ?>">
                                <div class="card-body text-center">
                                    <h4 class="card-title"><?= $row['kategori']; ?></h4>
                                    <p class="card-text">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?> / <?= $row['satuan_berat']; ?></p>
                                    <a href="pemesanan.php?kategori=<?= urlencode($row['kategori']); ?>" class="btn btn-sm btn-outline-success stretched-link">BUAT PESANAN</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>Tidak ada data kategori ditemukan.</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End main -->

    <footer id="footer" style="background-color: #ED9455;">
        <div class="container py-4">
            <div class="text-center text-white">
                &copy; Copyright <strong>HANDAL</strong>. 2024
            </div>
        </div>
    </footer>
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