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
<?php include 'koneksi.php' ?>

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
    <?php
    $error_No_Identitas = $error_Nama = $error_Alamat = $error_No_Hp = $error_Tgl_Ambil = $error_jenislayanan = $error_ambil = $error_jemput = "";
    $No_Identitas = $Nama = $Alamat = $No_Hp = $Tgl_Ambil = $jenislayanan = $ambil = $jemput = "";

    function cek_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <br><br><br><br>

    <div class="col-md-10 mx-auto">
        <div class="card border-gray">
            <div class="card-header text-white" style="background: #ED9455;">
                Form Pemesanan Laundry
            </div>
            <div class="card-body">
                <form method="post" action="prosespemesanan.php">
                    <div class="mb-3 row">
                        <label for="No_Identitas" class="col-sm-3 col-form-label">No Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" id="No_Identitas" name="No_Identitas" class="form-control" readonly>
                            <?php
                            // Prepare today's date string
                            $today = new DateTime();
                            $dd = $today->format('d');
                            $mm = $today->format('m');
                            $yy = $today->format('y');
                            $todayString = $dd . $mm . $yy;

                            // Query the maximum nomor_identitas for today's date
                            $sql = "SELECT MAX(nomor_identitas) AS lastNomorUrut FROM pesan WHERE nomor_identitas LIKE '$todayString%'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $lastNomorUrut = $row["lastNomorUrut"];
                                if ($lastNomorUrut) {
                                    // Strip the date portion and parse the number portion
                                    $lastNumber = substr($lastNomorUrut, 6);
                                    $nextNumber = intval($lastNumber) + 1;
                                } else {
                                    // If no entries for today
                                    $nextNumber = 1;
                                }
                            } else {
                                $nextNumber = 1;
                            }

                            $formattedNextNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
                            $fullIdentitas = $todayString . $formattedNextNumber;
                            ?>
                            <script>
                                document.getElementById("No_Identitas").value = '<?php echo $fullIdentitas; ?>';
                            </script>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama Customer</label>
                        <div class="col-sm-9">
                            <input type="text" name="Nama" id="Nama" class="form-control <?php echo ($error_Nama != "" ? "is-invalid" : ""); ?>" placeholder="Masukkan Nama Anda" value="<?php echo $Nama; ?>" required>
                            <span class="text-danger"><?php echo $error_Nama; ?></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="Alamat" id="Alamat" class="form-control <?php echo ($error_Alamat != "" ? "is-invalid" : ""); ?>" placeholder="Masukkan Alamat Lengkap Anda" value="<?php echo $Alamat; ?>" required>
                            <span class="text-danger"><?php echo $error_Alamat; ?></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="No_Hp" class="col-sm-3 col-form-label">No Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" name="No_Hp" id="No_Hp" class="form-control <?php echo ($error_No_Hp != "" ? "is-invalid" : ""); ?>" placeholder="+62" value="<?php echo $No_Hp; ?>" required>
                            <span class="text-danger"><?php echo $error_No_Hp; ?></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="Tgl_Cuci" class="col-sm-3 col-form-label">Tanggal Cuci</label>
                        <div class="col-sm-9">
                            <input type="date" name="Tgl_Cuci" id="Tgl_Cuci" class="form-control" readonly required>
                        </div>
                    </div>

                    <script>
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                        var yyyy = today.getFullYear();

                        var formattedDate = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("Tgl_Cuci").value = formattedDate;
                    </script>

                    <div class="mb-3 row">
                        <label for="Tgl_Ambil" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-9">
                            <input type="date" name="Tgl_Ambil" class="form-control <?php echo ($error_Tgl_Ambil != "" ? "is-invalid" : ""); ?>" required>
                            <span class="text-danger"><?php echo $error_Tgl_Ambil; ?></span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Ambil Sendiri</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ambil" id="ya" value="Ya">
                                <label class="form-check-label" for="ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ambil" id="tidak" value="Tidak">
                                <label class="form-check-label" for="tidak">Tidak</label>
                            </div>
                            <span class="text-danger"><?php echo $error_ambil; ?></span>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET['kategori'])) {
                        $kategori_terpilih = $_GET['kategori'];
                    } else {
                        $kategori_terpilih = "-- Pilih --";
                    }
                    ?>

                    <div class="mb-3 row">
                        <label for="jenislayanan" class="col-sm-3 col-form-label">Jenis Pemesanan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jenislayanan" required>
                                <option value="-- Pilih --" <?= ($kategori_terpilih == '-- Pilih --') ? 'selected' : ''; ?>>-- Pilih --</option>
                                <option value="Cuci Kering" <?= ($kategori_terpilih == 'Cuci Kering') ? 'selected' : ''; ?>>Cuci Kering</option>
                                <option value="Cuci Basah" <?= ($kategori_terpilih == 'Cuci Basah') ? 'selected' : ''; ?>>Cuci Basah</option>
                                <option value="Cuci Setrika" <?= ($kategori_terpilih == 'Cuci Setrika') ? 'selected' : ''; ?>>Cuci Setrika</option>
                                <option value="Dry Cleaning" <?= ($kategori_terpilih == 'Dry Cleaning') ? 'selected' : ''; ?>>Dry Cleaning</option>
                            </select>
                            <span class="text-danger"><?php echo $error_jenislayanan; ?></span>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan Bukti</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- End main -->
<br><br><br>

<!-- Start Footer -->
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