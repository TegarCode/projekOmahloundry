<?php
include 'koneksi.php';

$sql = "SELECT jenisPemesanan, COUNT(*) AS jumlah FROM detail GROUP BY jenisPemesanan";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row["jenisPemesanan"]] = $row["jumlah"];
    }
}

$labels = array_keys($data);
$jumlahPesanan = array_values($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>USA LAUNDRY</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
                    <h1 class="mt-4">Chart</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Chart Data Pesanan
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Layanan
                                    </div>
                                    <div class="card-body">
                                        <canvas id="Bar" width="100%" height="50"></canvas>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const data = {
                                    labels: <?php echo json_encode($labels); ?>,
                                    datasets: [{
                                        label: 'Jumlah Pesanan',
                                        data: <?php echo json_encode($jumlahPesanan); ?>,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                const ctx = document.getElementById('Bar').getContext('2d');
                                const Bar = new Chart(ctx, {
                                    type: 'bar',
                                    data: data,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Line Chart Layanan
                                    </div>
                                    <div class="card-body">
                                        <canvas id="Line" width="100%" height="50"></canvas>
                                    </div>
                                </div>
                                <script>
                                    const dataLine = {
                                        labels: <?php echo json_encode($labels); ?>,
                                        datasets: [{
                                            label: 'Jumlah Pesanan',
                                            data: <?php echo json_encode($jumlahPesanan); ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    };

                                    var ctxLine = document.getElementById('Line').getContext('2d');
                                    var Line = new Chart(ctxLine, {
                                        type: 'line',
                                        data: dataLine,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Pie Chart Cuci Layanan
                                </div>
                                <div class="card-body">
                                    <canvas id="Pie" width="100%" height="50"></canvas>
                                </div>
                            </div>
                            <script>
                                const dataPie = {
                                    labels: <?php echo json_encode($labels); ?>,
                                    datasets: [{
                                        label: 'Jumlah Pesanan',
                                        data: <?php echo json_encode($jumlahPesanan); ?>,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                };

                                var ctxPie = document.getElementById('Pie').getContext('2d');
                                var Pie = new Chart(ctxPie, {
                                    type: 'pie',
                                    data: dataPie,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/simple-datatables.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const labels = [];
            const data = [];

            <?php
            $query = "SELECT jenislayanan, COUNT(*) as total FROM detail GROUP BY jenislayanan"; // Replace 'detail' with the actual table name from your database
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "labels.push('" . $row['jenislayanan'] . "');";
                echo "data.push('" . $row['total'] . "');";
            }
            ?>

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctx2 = document.getElementById('myLineChart').getContext('2d');
            const myLineChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: data,
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctx3 = document.getElementById('pieChart').getContext('2d');
            const pieChart = new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Pie Chart Layanan'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>