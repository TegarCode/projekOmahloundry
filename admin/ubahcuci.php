<?php
if (isset($_GET['id_pesan'])) {
    $id_pesan = $_GET['id_pesan'];

    include 'koneksi.php';

    $query = "SELECT * FROM pesan WHERE id_pesan = $id_pesan";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Cuci</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.8.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.8.0/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
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
                <br>
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
                    <a href="vAdmin.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Admin
                    </a>
                    <a href="vKategori.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Kategori
                    </a>
                    <a href="vBerita.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Berita
                    </a>
                    <a href="vPelanggan.php">
                        <i class="far fa-address-card" aria-hidden="true"></i>
                        Pelanggan
                    </a>
                    <a href="vDetail.php">
                        <i class="far fa-calendar-check" aria-hidden="true"></i>
                        Data Detail
                    </a>
                    <a href="vDetail_Transaksi.php">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        Detail Transaksi
                    </a>
                </div>
            </aside>
        </div>
        <div id="layoutSidenav_content" style="margin-left: 50px;">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Ubah Data Cuci</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="datacuci.php">Data Cuci</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="prosesUpdate_Pelanggan.php">
                                <input type="hidden" name="id_pesan" value="<?= $row['id_pesan']; ?>">

                                <div class="mb-3 float-end">
                                    <div class="btn <?= $row['status_laundry'] == 2 ? 'btn-success' : ($row['status_laundry'] == 1 ? 'btn-warning' : ($row['status_laundry'] == 0 ? 'btn-primary' : 'btn-secondary')) ?>">
                                        <?= $row['status_laundry'] == 2 ? 'Selesai' : ($row['status_laundry'] == 1 ? 'Pickup' : ($row['status_laundry'] == 0 ? 'Proses' : 'Tidak diketahui')) ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $row['namaCustomer']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $row['alamatCustomer']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="No_Hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="No_Hp" name="No_Hp" value="<?= $row['telpCustomer']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Tgl_Cuci" class="form-label">Tanggal Cuci</label>
                                    <input type="date" class="form-control" id="Tgl_Cuci" name="Tgl_Cuci" value="<?= $row['tgl_cuci']; ?>" <?= $row['status_laundry'] == 2 ? 'readonly' : ''; ?> required>
                                </div>
                                <div class="mb-3">
                                    <label for="Tgl_Selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="Tgl_Selesai" name="Tgl_Selesai" value="<?= $row['tgl_selesai']; ?>" <?= $row['status_laundry'] == 2 ? 'readonly' : ''; ?> required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenislayanan" class="form-label">Jenis Layanan</label>
                                    <select class="form-control" id="jenislayanan" name="jenislayanan" <?= $row['status_laundry'] == 2 ? 'readonly' : ''; ?> required>
                                        <option value="Cuci Basah" <?= ($row['jenisPemesanan'] == 'Cuci Basah') ? 'selected' : ''; ?>>Cuci Basah</option>
                                        <option value="Cuci Kering" <?= ($row['jenisPemesanan'] == 'Cuci Kering') ? 'selected' : ''; ?>>Cuci Kering</option>
                                        <option value="Cuci Setrika" <?= ($row['jenisPemesanan'] == 'Cuci Setrika') ? 'selected' : ''; ?>>Cuci Setrika</option>
                                        <option value="Dry Cleaning" <?= ($row['jenisPemesanan'] == 'Dry Cleaning') ? 'selected' : ''; ?>>Dry Cleaning</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="dashboard.php" class="btn btn-danger">Kembali</a>
                            </form>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>