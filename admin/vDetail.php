<?php
include 'koneksi.php';
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM pesan";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM pesan";
$result3 = mysqli_query($conn, $query3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- Sidebar -->
            <?php include 'sidebar.php'; ?>
        </div>

        <div id="layoutSidenav_content" style="margin-left: 50px;">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Detail</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Detail</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #009999;">
                                        <tr>
                                            <th style="color: #fff;">No. Identitas</th>
                                            <th style="color: #fff;">Nama</th>
                                            <th style="color: #fff;">Alamat</th>
                                            <th style="color: #fff;">No. HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nomor_identitas'] . "</td>";
                                            echo "<td>" . $row['namaPelanggan'] . "</td>";
                                            echo "<td>" . $row['alamatPelanggan'] . "</td>";
                                            echo "<td>" . $row['telpPelanggan'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #009999;">
                                        <tr>
                                            <th style="color: #fff;">No. Identitas</th>
                                            <th style="color: #fff;">Tanggal Cuci</th>
                                            <th style="color: #fff;">Tanggal Selesai</th>
                                            <th style="color: #fff;">Pickup</th>
                                            <th style="color: #fff;">Jenis Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nomor_identitas'] . "</td>";
                                            echo "<td>" . $row['tgl_cuci'] . "</td>";
                                            echo "<td>" . $row['tgl_selesai'] . "</td>";
                                            echo "<td>" . $row['pickup'] . "</td>";
                                            echo "<td>" . $row['jenisPemesanan'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>