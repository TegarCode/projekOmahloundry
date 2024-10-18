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
