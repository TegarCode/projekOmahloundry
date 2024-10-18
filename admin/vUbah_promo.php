<?php
include 'koneksi.php';

// Periksa apakah parameter 'id' ada di URL dan ambil data promo berdasarkan ID
if (isset($_GET['id'])) {
    $id_promo = $_GET['id'];

    // Query untuk mengambil data promo berdasarkan ID
    $query_select = "SELECT * FROM promo WHERE id = ?";
    $stmt_select = mysqli_prepare($conn, $query_select);
    
    if ($stmt_select === false) {
        die("Error saat mempersiapkan query SQL: " . mysqli_error($conn));
    }

    // Bind parameter ID promo
    mysqli_stmt_bind_param($stmt_select, "i", $id_promo);
    mysqli_stmt_execute($stmt_select);
    $result_select = mysqli_stmt_get_result($stmt_select);
    
    // Periksa apakah data promo ditemukan
    if (mysqli_num_rows($result_select) > 0) {
        $promo = mysqli_fetch_assoc($result_select);
    } else {
        echo "<script>alert('Data promo tidak ditemukan.'); window.location.href = 'vPromo.php';</script>";
        exit();
    }
    
    // Tutup statement
    mysqli_stmt_close($stmt_select);
} else {
    echo "<script>alert('ID promo tidak ditemukan.'); window.location.href = 'vPromo.php';</script>";
    exit();
}

// Proses pembaruan data promo setelah form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_promo = $_POST['kode_promo'];
    $deskripsi = $_POST['deskripsi'];
    $diskon = $_POST['diskon'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    // Query untuk memperbarui data promo
    $query_update = "UPDATE promo SET kode_promo = ?, deskripsi = ?, diskon = ?, tanggal_mulai = ?, tanggal_selesai = ? WHERE id = ?";
    $stmt_update = mysqli_prepare($conn, $query_update);
    
    if ($stmt_update === false) {
        die("Error saat mempersiapkan query SQL: " . mysqli_error($conn));
    }

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt_update, "sssssi", $kode_promo, $deskripsi, $diskon, $tanggal_mulai, $tanggal_selesai, $id_promo);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt_update)) {
        echo "<script>alert('Data berhasil diubah.'); window.location.href = 'vPromo.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data promo.');</script>";
    }

    // Tutup statement
    mysqli_stmt_close($stmt_update);
}

// Tutup koneksi database
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ubah Promo</title>
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
                    <h1 class="mt-4">Ubah Promo</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="vPromo.php">Promo</a></li>
                        <li class="breadcrumb-item active">Ubah Promo</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="kode_promo" class="form-label">Kode Promo</label>
                                    <input type="text" class="form-control" id="kode_promo" name="kode_promo" value="<?php echo htmlspecialchars($promo['kode_promo']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Promo</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($promo['deskripsi']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <input type="text" class="form-control" id="diskon" name="diskon" value="<?php echo htmlspecialchars($promo['diskon']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo htmlspecialchars($promo['tanggal_mulai']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo htmlspecialchars($promo['tanggal_selesai']); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>


