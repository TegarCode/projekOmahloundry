<!DOCTYPE html>
<html>

<head>
    <title>Nota Laundry</title>
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
        body {
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white text-center" style="background: #4793AF;">
                Nota Laundry
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group row">
                        <?php
                        if (isset($_GET['nomor_identitas'])) {
                            include 'koneksi.php';
                            $nomor_identitas = $_GET['nomor_identitas'];
                            $query = "SELECT * FROM pesan WHERE nomor_identitas = '$nomor_identitas'";
                            $result = mysqli_query($conn, $query);

                            session_start();
                        ?>

                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.Hp</th>
                                    <th>Tanggal Cuci</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jemput/Ambil Baju</th>
                                    <th>Jenis Layanan</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['namaCustomer']}</td>
                                            <td>{$row['alamatCustomer']}</td>
                                            <td>{$row['telpCustomer']}</td>
                                            <td>{$row['tgl_cuci']}</td>
                                            <td>{$row['tgl_selesai']}</td>
                                            <td>{$row['pickup']}</td>
                                            <td>{$row['jenisPemesanan']}</td>
                                            <td>" . statusLaundry($row['status_laundry']) . "</td>
                                        </tr>";
                                }
                                ?>
                            </table>
                        <?php
                        }
                        function statusLaundry($status)
                        {
                            switch ($status) {
                                case 0:
                                    return "<div class='btn btn-sm btn-secondary'>Proses</div>";
                                case 1:
                                    return "<div class='btn btn-sm btn-warning' style='color: white;'>Siap Diambil/Diantar</div>";
                                case 2:
                                    return "<div class='btn btn-sm btn-success'>Selesai</div>";
                                case 3:
                                    return "<div class='btn btn-sm btn-info'>Siap Diambil/Diantar</div>";
                                default:
                                    return "Status tidak valid";
                            }
                        }
                        ?>
                    </div>
                    <br>
                </form>
                <form action="lacak.php" method="POST">
                    <div class="form-group row">
                        <button type="kembali" name="kembali" class="btn btn-outline-danger btn-block">Back</button>
                    </div>
                </form>
                <form method="POST" action="report.php">
                    <input type="hidden" id="No_Identitas" name="No_Identitas" placeholder="Masukkan Nomor Identitas" class="form-control" value="<?= $nomor_identitas ?>" required>
                    <div class="form-group row">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Cetak Nota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
