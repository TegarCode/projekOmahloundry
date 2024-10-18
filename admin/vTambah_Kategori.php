<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $satuan_berat = $_POST['satuan_berat'];

    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = './assets/kategori/' . $foto;

    if (move_uploaded_file($foto_tmp, $foto_path)) {
        $query_insert = "INSERT INTO kategori (kategori, harga, satuan_berat, foto) VALUES ('$kategori', '$harga', '$satuan_berat', '$foto')";
        $result_insert = mysqli_query($conn, $query_insert);

        if ($result_insert) {
            header("Location: vKategori.php");
            exit();
        } else {
            echo "Gagal menambahkan data kategori. Silakan coba lagi.";
        }
    } else {
        echo "Gagal mengunggah foto. Silakan coba lagi.";
    }
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
    <title>Tambah Kategori</title>
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
                    <h1 class="mt-4">Tambah Kategori</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="vKategori.php">Data Kategori</a></li>
                        <li class="breadcrumb-item active">Tambah Kategori</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="mb-3">
                                    <label for="satuan_berat" class="form-label">satuan_berat</label>
                                    <input type="text" class="form-control" id="satuan_berat" name="satuan_berat" placeholder="Ons | Kilogram | Ton">
                                </div>
                                <div class="mb-3">
                                    <label for="Foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="vKategori.php" class="btn btn-secondary">Batal</a>
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