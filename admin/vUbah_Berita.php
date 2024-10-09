<?php
include 'koneksi.php';
if (isset($_GET['id_berita'])) {
    $id_berita = $_GET['id_berita'];

    $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $narasumber = $_POST['narasumber'];
            $tanggal_up = $_POST['tanggal_up'];
            $judul_berita = $_POST['judul_berita'];
            $isi_berita = $_POST['isi_berita'];
            $foto = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];

            if (!empty($foto)) {
                $foto_path = './assets/img/' . $foto;
                if (move_uploaded_file($foto_tmp, $foto_path)) {
                    $query_update = "UPDATE berita SET narasumber = '$narasumber', tanggal_up = '$tanggal_up', judul_berita = '$judul_berita', isi_berita = '$isi_berita', foto = '$foto' WHERE id_berita = '$id_berita'";
                    $result_update = mysqli_query($conn, $query_update);

                    if ($result_update) {
                        header("Location: vBerita.php");
                        exit();
                    } else {
                        echo "Gagal mengubah data Berita. Silakan coba lagi.";
                    }
                } else {
                    echo "Gagal mengunggah foto. Silakan coba lagi.";
                }
            } else {
                $query_update = "UPDATE berita SET narasumber = '$narasumber', tanggal_up = '$tanggal_up', judul_berita = '$judul_berita', isi_berita = '$isi_berita' WHERE id_berita = '$id_berita'";
                $result_update = mysqli_query($conn, $query_update);

                if ($result_update) {
                    header("Location: vBerita.php");
                    exit();
                } else {
                    echo "Gagal mengubah data Berita. Silakan coba lagi.";
                }
            }
        }
    } else {
        echo "Data Admin tidak ditemukan.";
    }
} else {
    echo "No_Identitas tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ubah Berita</title>
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
                    <a href="vPromo.php">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        Promo
                    </a>
                    <a href="vReview.php">
                        <i class="far fa-commenting" aria-hidden="true"></i>
                        Review
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
                    <h1 class="mt-4">Ubah Berita</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="vBerita.php">Data Berita</a></li>
                        <li class="breadcrumb-item active">Ubah Berita</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="narasumber" class="form-label">Narasumber</label>
                                    <input type="text" class="form-control" id="narasumber" name="narasumber" value="<?= $row['narasumber']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Tanggal Upload" class="form-label">Tanggal Upload</label>
                                    <input type="date" class="form-control" id="Tanggal Upload" name="tanggal_up" value="<?= $row['tanggal_up']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Judul Berita" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="Judul Berita" name="judul_berita" value="<?= $row['judul_berita']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Isi Berita" class="form-label">Isi Berita</label>
                                    <input type="text" class="form-control" id="Isi Berita" name="isi_berita" value="<?= $row['isi_berita']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Foto" class="form-label">Foto</label>
                                    <input type="text" class="form-control" id="Foto" value="<?= $row['foto']; ?>" readonly>
                                    <img src="<?= './assets/img/' . $row['foto'] ?>" alt="foto" style="width: 150px; height: 150px;">
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="vBerita.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>