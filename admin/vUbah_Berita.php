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