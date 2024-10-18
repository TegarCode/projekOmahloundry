<?php
include 'koneksi.php';
$query = "SELECT * FROM detail";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM pesan";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM pesan";
$result3 = mysqli_query($conn, $query3);

$query4 = "SELECT * FROM pesan";
$result4 = mysqli_query($conn, $query4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Detail Transaksi</title>
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
                                    <thead>
                                        <tr>
                                            <th>No. Identitas</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Tanggal Cuci</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Siap Diambil/Diantar</th>
                                            <th>Jenis Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['nomor_identitas'] . "</td>";
                                            echo "<td>" . $row['namaCustomer'] . "</td>";
                                            echo "<td>" . $row['alamatCustomer'] . "</td>";
                                            echo "<td>" . $row['telpCustomer'] . "</td>";
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
                    <div>
                        <h4 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;">Detail Proses Pengerjaan Laundry</h4>
                    </div>
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
                                            <th style="color: #fff;">Tanggal Cuci</th>
                                            <th style="color: #fff;">Tanggal Selesai</th>
                                            <th style="color: #fff;">Siap Diambil/Diantar</th>
                                            <th style="color: #fff;">Jenis Pemesanan</th>
                                            <th style="color: #fff;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            if ($row['status_laundry'] == 0) {
                                                echo "<tr>";
                                                echo "<td>" . $row['nomor_identitas'] . "</td>";
                                                echo "<td>" . $row['namaCustomer'] . "</td>";
                                                echo "<td>" . $row['alamatCustomer'] . "</td>";
                                                echo "<td>" . $row['telpCustomer'] . "</td>";
                                                echo "<td>" . $row['tgl_cuci'] . "</td>";
                                                echo "<td>" . $row['tgl_selesai'] . "</td>";
                                                echo "<td>" . $row['pickup'] . "</td>";
                                                echo "<td>" . $row['jenisPemesanan'] . "</td>";

                                                if ($row['status_laundry'] == 0) {
                                                    echo "<td><div class='btn btn-sm btn-outline-danger'>Proses</div></td>";
                                                } else {
                                                    echo "<td>" . $row['status_laundry'] . "</td>";
                                                }

                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th style="color: #fff;">Tanggal Cuci</th>
                                            <th style="color: #fff;">Tanggal Selesai</th>
                                            <th style="color: #fff;">Siap Diambil/Diantar</th>
                                            <th style="color: #fff;">Jenis Pemesanan</th>
                                            <th style="color: #fff;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result3)) {
                                            if ($row['status_laundry'] == 1) {
                                                echo "<tr>";
                                                echo "<td>" . $row['nomor_identitas'] . "</td>";
                                                echo "<td>" . $row['namaCustomer'] . "</td>";
                                                echo "<td>" . $row['alamatCustomer'] . "</td>";
                                                echo "<td>" . $row['telpCustomer'] . "</td>";
                                                echo "<td>" . $row['tgl_cuci'] . "</td>";
                                                echo "<td>" . $row['tgl_selesai'] . "</td>";
                                                echo "<td>" . $row['pickup'] . "</td>";
                                                echo "<td>" . $row['jenisPemesanan'] . "</td>";

                                                if (empty($row['pickup'])) {
                                                    echo "<td>Tidak ada data yang di Siap Diambil/Diantar</td>";
                                                } else {
                                                    if ($row['status_laundry'] == 1) {
                                                        echo "<td><div class='btn btn-sm btn-outline-warning'>Siap Diambil/Diantar</div></td>";
                                                    } else {
                                                        echo "<td>" . $row['status_laundry'] . "</td>";
                                                    }
                                                }

                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                                            <th style="color: #fff;">Tanggal Cuci</th>
                                            <th style="color: #fff;">Tanggal Selesai</th>
                                            <th style="color: #fff;">Siap Diambil/Diantar</th>
                                            <th style="color: #fff;">Jenis Pemesanan</th>
                                            <th style="color: #fff;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result4)) {
                                            if ($row['status_laundry'] == 2) {
                                                echo "<tr>";
                                                echo "<td>" . $row['nomor_identitas'] . "</td>";
                                                echo "<td>" . $row['namaCustomer'] . "</td>";
                                                echo "<td>" . $row['alamatCustomer'] . "</td>";
                                                echo "<td>" . $row['telpCustomer'] . "</td>";
                                                echo "<td>" . $row['tgl_cuci'] . "</td>";
                                                echo "<td>" . $row['tgl_selesai'] . "</td>";
                                                echo "<td>" . $row['pickup'] . "</td>";
                                                echo "<td>" . $row['jenisPemesanan'] . "</td>";

                                                if (empty($row['pickup'])) {
                                                    echo "<td>Tidak ada data yang Selesai</td>";
                                                } else {
                                                    if ($row['status_laundry'] == 2) {
                                                        echo "<td><div class='btn btn-sm btn-outline-success'>Selesai</div></td>";
                                                    } else {
                                                        echo "<td>" . $row['status_laundry'] . "</td>";
                                                    }
                                                }

                                                echo "</tr>";
                                            }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
