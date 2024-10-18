<?php
include 'koneksi.php';

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_promo = $_POST['kode_promo'];
    $deskripsi_promo = $_POST['deskripsi_promo'];
    $diskon = $_POST['diskon'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $valid = 1; // nilai valid default 1

    // Query untuk menambahkan data promo
    $query_insert = "INSERT INTO promo (kode_promo, deskripsi, diskon, valid, tanggal_mulai, tanggal_selesai) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query_insert);

    if ($stmt === false) {
        die("Error saat mempersiapkan query SQL: " . mysqli_error($conn));
    }

    // Pastikan jumlah tipe data sesuai dengan jumlah variabel yang di-bind
    mysqli_stmt_bind_param($stmt, "sssiss", $kode_promo, $deskripsi_promo, $diskon, $valid, $tanggal_mulai, $tanggal_selesai);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: vPromo.php");
        exit();
    } else {
        echo "Gagal menambahkan data promo. Error: " . mysqli_error($conn);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
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
    <title>Tambah Promo</title>
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
                    <h1 class="mt-4">Tambah Promo</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="vPromo.php">Data Promo</a></li>
                        <li class="breadcrumb-item active">Tambah Promo</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="kode_promo" class="form-label">Kode Promo</label>
                                    <input type="text" class="form-control" id="kode_promo" name="kode_promo">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_promo" class="form-label">Deskripsi Promo</label>
                                    <input type="text" class="form-control" id="deskripsi_promo" name="deskripsi_promo">
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <input type="text" class="form-control" id="diskon" name="diskon">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="vPromo.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
