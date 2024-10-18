<?php
include 'koneksi.php';
$query = "SELECT * FROM berita";
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
    <title>Data Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>
    .table td {
        white-space: nowrap;
        max-width: 200px;
        /* Atur lebar maksimum untuk teks */
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

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
                    <h1 class="mt-4">Data Berita</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Berita</li>
                        <li class="breadcrumb-item"><a href="vTambah_Berita.php">Tambah Data</a></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Narasumber</th>
                                            <th>Tanggal Upload</th>
                                            <th>Judul Berita</th>
                                            <th>Isi Berita</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['narasumber'] . "</td>";
                                            echo "<td>" . $row['tanggal_up'] . "</td>";
                                            echo "<td>" . $row['judul_berita'] . "</td>";
                                            echo "<td>" . $row['isi_berita'] . "</td>";
                                            echo "<td><img src='./assets/img/" . $row['foto'] . "' alt='Foto' width='150' height='150'></td>";
                                            echo "<td>";
                                            echo "<a href='hapusBerita.php?id_berita=" . $row["id_berita"] . "' class='btn btn-sm btn-danger' style='margin-right: 10px;'><i class='fas fa-trash'></i> Hapus</a>";
                                            echo "<a href='vUbah_Berita.php?id_berita=" . $row["id_berita"] . "' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i> Ubah</a>";
                                            echo "</td>";
                                            echo "</tr>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>