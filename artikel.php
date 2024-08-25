<?php
include 'koneksi.php';
$query2 = "SELECT * FROM berita";
$result2 = mysqli_query($conn, $query2);

?>
<!DOCTYPE html>
<html lang="">

<head>
    <title>Laundry Prapen - Berita</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top">
    <div class="bgded overlay light" style="background-image:url('images/demo/backgrounds/01.png');">
        <div class="wrapper row1" style="background-color: rgba(255, 197, 126, 0.9); color: #fff;">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <h1><a href="index.php">Laundry Prapen</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="index.php#tentang">Tentang</a></li>
                        <li><a href="index.php#excess">Keunggulan</a></li>
                        <li><a href="index.php#gallery">Galeri</a></li>
                        <li><a href="index.php#testimoni">Testimoni</a></li>
                        <li><a class="drop active" href="#">Berita</a>
                            <ul style="background-color: rgba(255, 197, 126, 0.9); color: #fff;">
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="artikel.php">Berita</a></li>
                                <li><a href="sosmed.php">Sosial Media</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php#lokasi">Lokasi</a></li>
                        <li><a class="drop" href="#">Pesan</a>
                            <ul style="background-color: rgba(255, 197, 126, 0.9); color: #fff;">
                                <li><a href="customer.php">Pesan</a></li>
                                <li><a href="lacak.php">Lacak</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>

    </div>

    <div id="pageintro" class="hoc clear">
        <div class="flexslider basicslider" style="background-color: rgba(255, 197, 126, 0.9); color: #fff;  height: 300px; max-width: 100%; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);">
            <ul class="slides">
                <li>
                    <article style="margin-top: 50px;">
                        <p>Selamat Datang</p>
                        <h3 class="heading">Laundry Prapen</h3>
                        <p>Portal Berita Laundry Prapen</p>
                        <footer><a class="btn" href="#">Beranda</a></footer>
                    </article>
                </li>
                <li>
                    <article style="margin-top: 50px;">
                        <p>Selamat Datang</p>
                        <h3 class="heading">Laundry Prapen</h3>
                        <p>Portal Berita Laundry Prapen</p>
                        <footer>
                            <form id="whatsappForm" class="group" onsubmit="submitForm()">
                                <fieldset>
                                    <legend>Kritik & Saran:</legend>
                                    <input id="whatsappMessage" type="text" value="" placeholder="Masukkan Saran ...">
                                    <button class="fa fa-sign-in" type="submit" title="Submit"><em>Submit</em></button>
                                </fieldset>
                            </form>

                            <script>
                                function submitForm() {
                                    var message = document.getElementById('whatsappMessage').value;
                                    var phoneNumber = '+62895631218280';
                                    var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);
                                    window.open(whatsappUrl, '_blank');

                                    return false;
                                }
                            </script>

                        </footer>
                    </article>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper row3" style="margin-top: -200px;">
        <main class="hoc container clear">
            <!-- main body -->
            <article class="group btmspace-80">
    <?php
    if (isset($_GET['id_berita'])) {
        $id_berita = $_GET['id_berita'];
        $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 100%; max-width: 100%; text-align: center;">
                <img class="borderedbox inspace-10" src="./admin/assets/img/<?php echo $row['foto']; ?>" style="width: 800px; height: 400px;" alt="img">
            </div>
            <div style="flex: 1 1 100%; max-width: 100%; text-align: center;">
                <h6 class="heading" style="text-align: center;"><?php echo $row['judul_berita']; ?></h6>
                <ul class="nospace meta">
                    <li><i class="fa fa-user"></i> <a href="#"><?php echo $row['narasumber']; ?></a></li>
                </ul>
                <p style="text-align: justify; margin: 0 20px;"><?php echo nl2br($row['isi_berita']); ?></p>
                <footer class="nospace"><a class="btn" href="index.php">Kembali &raquo;</a></footer>
            </div>
        </div>
    <?php
    } else {
        echo "<p>Tidak ada berita yang dipilih.</p>";
    }
    ?>
</article>


            <hr class="btmspace-80">

            <?php
            if (isset($_GET['id_berita'])) {
                $id_berita_terpilih = $_GET['id_berita'];
            } else {
                $id_berita_terpilih = -1;
            }

            $query = "SELECT * FROM berita WHERE id_berita != '$id_berita_terpilih'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            ?>
                <ul class="nospace group overview">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <li class="one_third">
                            <article>
                                <a href="#"><img src="./admin/assets/img/<?php echo $row['foto']; ?>" alt="" style="width: 320px; height: 240px;"></a>
                                <h6 class="heading"><?php echo $row['judul_berita']; ?></h6>
                                <ul class="nospace meta">
                                    <li><i class="fa fa-user"></i> <a href="#"><?php echo $row['narasumber']; ?></a></li>
                                </ul>
                                <p><?php echo implode(' ', array_slice(explode(' ', $row['isi_berita']), 0, 10)); ?>...</p>
                                <footer class="nospace"><a class="btn" href="artikel.php?id_berita=<?php echo $row['id_berita']; ?>">Baca Selengkapnya &raquo;</a></footer>
                            </article>
                        </li>
                    <?php } ?>
                </ul>
            <?php
            } else {
                echo "<p>Tidak ada berita yang tersedia.</p>";
            }
            ?>
            <div class="clear"></div>
        </main>
    </div>

    <div class="wrapper row5">
        <div id="copyright" class="hoc clear">
            <p class="fl_left">Copyright &copy; 2024 - Laundry Prapen</p>
            <p class="fl_right">Template by <a target="_blank" href="#" title="Free Website Templates">Laundry Prapen</a></p>
        </div>
    </div>
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>

</html>