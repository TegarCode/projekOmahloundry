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
    <title>Data Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>
    aside {
        color: #fff;
        width: 250px;
        padding-left: 20px;
        height: 100vh;
        background-image: linear-gradient(45deg, #f05053 80%, #e1eec3);
        /* background-image: linear-gradient(#f05053 80%, #e1eec3);
        border-top-right-radius: 100px;
        border-bottom-right-radius: 200px; */
    }

    aside p {
        margin: 0;
        padding: 40px 0;
    }

    aside a {
        font-size: 14px;
        color: #fff;
        display: block;
        padding: 12px;
        padding-left: 30px;
        text-decoration: none;
        -webkit-tap-highlight-color: transparent;
    }

    aside a:hover {
        color: #3f5efb;
        background: #fff;
        outline: none;
        position: relative;
        background-color: #fff;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    aside a i {
        margin-right: 5px;
    }

    aside a:hover::after,
    aside a:hover::before {
        content: "";
        position: absolute;
        background-color: transparent;
        right: 0;
        width: 35px;
        border-radius: 18px;
        box-shadow: 0 20px 0 0 #fff;
    }

    aside a:hover::after {
        bottom: 100%;
    }

    aside a:hover::before {
        top: 38px;
    }

    .social {
        height: 0;
        position: fixed;
        bottom: 15px;
        right: 15px;
    }

    .social i {
        width: 14px;
        height: 14px;
        font-size: 14px;
        color: #fff;
        background: #0077B5;
        padding: 10px;
        border-radius: 50%;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="navbar navbar-expand navbar-warning bg-warning" style="width: 50%; margin: 0 auto; border-top-right-radius: 50px; border-bottom-right-radius: 600px; border-top-left-radius: 50px; border-bottom-left-radius: 600px; margin-right: 250px; background: linear-gradient(#f05053 80%, #e1eec3); border-radius: 50px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); ">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="margin-left: 50px; color: #fff;"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <aside>
                <div class="icon">
                    <img src="./assets/img/pic1.png" alt="Logo" style="width: 50%; margin-left: 30px; margin-top: 20px;">
                    <h3 style="padding-top: 0px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Laundry Admin</h3>
                </div>
                <div class="master">
                    <h5> Menu </h5>
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                        Dashboard
                    </a>
                    <a href="vTransaksi.php">
                        <i class="fas fa-chart-area" aria-hidden="true"></i>
                        Proses Transaksi
                    </a>
                    <a href="vDetail_Transaksi.php">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        Detail Transaksi
                    </a>
                    <a href="vPelanggan.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Pelanggan
                    </a>
                    <a href="vDetail.php">
                        <i class="far fa-calendar-check" aria-hidden="true"></i>
                        Data Detail
                    </a>
                    <a href="vKategori.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Kategori
                    </a>
                    <a href="vBerita.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Berita
                    </a>
                    <a href="vAdmin.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Admin
                    </a>
                </div>
            </aside>
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
