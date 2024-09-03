<!DOCTYPE html>
<html>

<head>
    <title>Nota Laundry</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #343a40;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            background-color: #4793AF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #6baac2;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            grid-gap: .5rem;
            font-size: 2rem;
            color: #eec197;
            margin-bottom: 2rem;
        }

        .rating .star {
            cursor: pointer;
        }

        .rating .star.active {
            opacity: 1;
            animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
        }

        .star {
            cursor: pointer;
            color: gray;
            font-size: 36px;
        }

        .star.outline {
            color: transparent;
            -webkit-text-stroke: 1px gold;
        }

        .star.filled {
            color: gold;
            -webkit-text-stroke: 0;
        }

        @keyframes animate {
            0% {
                opacity: 0;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .rating .star:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white text-center" style="background: #4793AF;">
                Nota Laundry
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group row">
                        <?php
                        if (isset($_GET['nomor_identitas'])) {
                            include 'koneksi.php';
                            $nomor_identitas = $_GET['nomor_identitas'];
                            $query = "SELECT * FROM pesan WHERE nomor_identitas = '$nomor_identitas'";
                            $result = mysqli_query($conn, $query);

                            //session_start();
                        ?>

                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.Hp</th>
                                    <th>Tanggal Cuci</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jemput/Ambil Baju</th>
                                    <th>Jenis Layanan</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['namaCustomer']}</td>
                                            <td>{$row['alamatCustomer']}</td>
                                            <td>{$row['telpCustomer']}</td>
                                            <td>{$row['tgl_cuci']}</td>
                                            <td>{$row['tgl_selesai']}</td>
                                            <td>{$row['pickup']}</td>
                                            <td>{$row['jenisPemesanan']}</td>
                                            <td>" . statusLaundry($row['status_laundry']) . "</td>
                                        </tr>";

                                    if ($row['status_laundry'] == 2) {
                                        echo "<tr>
                                                <td colspan='8' class='text-center'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm' onclick='openReviewPopup()'>Beri Penilaian</button>
                                                </td>
                                              </tr>";
                                    }
                                }
                                ?>
                                <script>
                                    function openReviewPopup() {
                                        document.getElementById('reviewPopup').style.display = 'block';
                                    } 
                                </script>
                            </table>
                        <?php
                        }
                        function statusLaundry($status)
                        {
                            switch ($status) {
                                case 0:
                                    return "<div class='btn btn-sm btn-secondary'>Proses</div>";
                                case 1:
                                    return "<div class='btn btn-sm btn-warning' style='color: white;'>Siap Diambil/Diantar</div>";
                                case 2:
                                    return "<div class='btn btn-sm btn-success'>Selesai</div>";
                                case 3:
                                    return "<div class='btn btn-sm btn-info'>Siap Diambil/Diantar</div>";
                                default:
                                    return "Status tidak valid";
                            }
                        }
                        ?>
                    </div>
                </form>
                <form action="lacak.php" method="POST">
                    <div class="form-group row mb-2">
                        <button type="kembali" name="kembali" class="btn btn-outline-danger btn-block">Back</button>
                    </div>
                </form>
                <form method="POST" action="report.php">
                    <input type="hidden" id="No_Identitas" name="No_Identitas" placeholder="Masukkan Nomor Identitas" class="form-control" value="<?= $nomor_identitas ?>" required>
                    <div class="form-group row">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Cetak Nota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Pop-up Review -->
    <div id="reviewPopup" class="popup">
        <form class="popup-content" method="post" action="review.php">
            <span class="close-button" onclick="closePopup()">&times;</span>
            <script>
                function closePopup() {
                    document.getElementById('reviewPopup').style.display = 'none';
                }
            </script>
            
            <h3>Bagaimana layanan laundry kami?</h3>
            <p>Tolong berikan review dan saran!</p>
            <div class="rating">
                <input type="hidden" name="rating" id="rating">
                <i class='bx bxs-star star outline' onclick="setRating(1)"></i>
                <i class='bx bxs-star star outline' onclick="setRating(2)"></i>
                <i class='bx bxs-star star outline' onclick="setRating(3)"></i>
                <i class='bx bxs-star star outline' onclick="setRating(4)"></i>
                <i class='bx bxs-star star outline' onclick="setRating(5)"></i>
            </div>
            <script>
                function setRating(rating) {
                    const stars = document.querySelectorAll('.star');
                    stars.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.add('filled');
                            star.classList.remove('outline');
                        } else {
                            star.classList.add('outline');
                            star.classList.remove('filled');
                        }
                    });
                    document.getElementById('rating').value = rating;
                }
            </script>

            <input type="text" id="nama" name="nama" placeholder="Nama (Max 20 Huruf)">
            <div id="namaError" class="error"></div>
            <textarea id="isi_review" name="isi_review" rows="4" placeholder="Tuliskan review..."></textarea>
            <div id="reviewError" class="error"></div>
            <button onclick="submitReview()">Submit</button>
            <script>
                function submitReview() {
                    const isi_review = document.getElementById('isi_review').value.trim();
                    const nama = document.getElementById('nama').value.trim();
                    const rating = document.getElementById('rating').value;
                    let valid = true;

                    document.getElementById('namaError').innerText = '';
                    document.getElementById('reviewError').innerText = '';

                    if (!nama) {
                        document.getElementById('namaError').innerText = 'Kolom tidak boleh kosong!';
                        valid = false;
                    } else if (nama.length > 20) {
                        document.getElementById('namaError').innerText = 'Nama maksimal 20 huruf!';
                        valid = false;
                    }

                    if (!isi_review) {
                        document.getElementById('reviewError').innerText = 'Kolom tidak boleh kosong!';
                        valid = false;
                    }

                    if (!rating) {
                        alert('Silakan pilih rating!');
                        valid = false;
                    }

                    if (!valid) {
                        return;
                    }
                }
            </script>
        </form>
    </div>
</body>

</html>
