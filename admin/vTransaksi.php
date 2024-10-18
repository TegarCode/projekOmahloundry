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
                                <th>Diskon</th>
                                <td><?= $row["diskon"] ?>%</td>
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
                                    <th>Diskon</th>
                                    <td><?= $row["diskon"] ?>%</td>
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