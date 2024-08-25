<?php
include 'koneksi.php';
$query = "SELECT * FROM pesan";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Proses Transaksi</title>
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
                    <h1 class="mt-4">Proses Transaksi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Proses Transaksi</li>
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
                                            <th>Aksi</th>
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
                                            echo "<td>";
                                            echo "<a href='#' class='btn btn-sm btn-primary detailButton' style='margin-right: 10px;' data-bs-toggle='modal' data-bs-target='#detailModal" . $row["id_pesan"] . "'><i class='far fa-calendar-check'></i> Detail</a>";
                                            echo "<a href='#' class='btn btn-sm btn-success detailButton' data-bs-toggle='modal' data-bs-target='#updateModal" . $row["id_pesan"] . "'><i class='fa fa-calculator'></i> Proses</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        ?>
                                        <?php
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
    </div>

    <!-- Modal Detail-->
    <?php
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="modal fade" id="detailModal<?= $row["id_pesan"] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $row["namaCustomer"] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $row["alamatCustomer"] ?></td>
                                </tr>
                                <tr>
                                    <th>No Telepon</th>
                                    <td><?= $row["telpCustomer"] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Cuci</th>
                                    <td><?= $row["tgl_cuci"] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= $row["tgl_selesai"] ?></td>
                                </tr>
                                <tr>
                                    <th>Ambil</th>
                                    <td><?= $row["pickup"] ?></td>
                                </tr>
                                <tr>
                                    <th>Pelayanan</th>
                                    <td><?= $row["jenisPemesanan"] ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                        $status = $row["status_laundry"];
                                        switch ($status) {
                                            case 0:
                                                echo "<span class='badge badge-secondary' style='color: gray;'>Proses</span>";
                                                break;
                                            case 1:
                                                echo "<span class='badge badge-warning' style='color: yellow;'>Pickup</span>";
                                                break;
                                            case 2:
                                                echo "<span class='badge badge-success' style='color: green;'>Selesai</span>";
                                                break;
                                            default:
                                                echo "Status tidak valid";
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Proses -->
    <?php
    }
    ?>

    <!-- Modal Proses-->
    <?php
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="modal fade" id="updateModal<?= $row["id_pesan"] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Proses Pesanan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $row["namaCustomer"] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= $row["tgl_selesai"] ?></td>
                                </tr>
                                <tr>
                                    <th>Ambil</th>
                                    <td><?= $row["pickup"] ?></td>
                                </tr>
                                <tr>
                                    <th>Pelayanan</th>
                                    <td><?= $row["jenisPemesanan"] ?></td>
                                </tr>
                                <tr>
                                    <th>Status Sekarang</th>
                                    <td>
                                        <?php
                                        $status = $row["status_laundry"];
                                        switch ($status) {
                                            case 0:
                                                echo "<span class='badge badge-secondary' style='color: gray;'>Proses</span>";
                                                break;
                                            case 1:
                                                echo "<span class='badge badge-warning' style='color: yellow;'>Siap Diambil/Diantar</span>";
                                                break;
                                            case 2:
                                                echo "<span class='badge badge-success' style='color: green;'>Selesai</span>";
                                                break;
                                            default:
                                                echo "Status tidak valid";
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php if ($row["status_laundry"] != 2) { ?>
                                    <form action="prosesLaundry.php" method="POST">
                                        <input type="hidden" name="id_pesan" value="<?= $row["id_pesan"]; ?>">
                                        <tr>
                                            <th>Proses</th>
                                            <td>
                                                <select class="form-control" name="status_laundry">
                                                    <option value="0" <?php if ($row["status_laundry"] == 0) echo "selected"; ?>>Proses</option>
                                                    <option value="1" <?php if ($row["status_laundry"] == 1) echo "selected"; ?>>Siap Diambil/Diantar</option>
                                                    <option value="2" <?php if ($row["status_laundry"] == 2) echo "selected"; ?>>Selesai</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary" style="justify-content: left;">Proses Status</button>
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Proses -->
    <?php
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- Bootsrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>