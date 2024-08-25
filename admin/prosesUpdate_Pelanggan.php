<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_pesan'])) {
        $id_pesan = $_POST['id_pesan'];

        include 'koneksi.php';

        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $No_Hp = $_POST['No_Hp'];
        $Tgl_Cuci = $_POST['Tgl_Cuci'];
        $Tgl_Selesai = $_POST['Tgl_Selesai'];
        $jenislayanan = $_POST['jenislayanan'];

        $query = "UPDATE pesan SET namaCustomer = '$Nama', alamatCustomer = '$Alamat', telpCustomer = '$No_Hp', tgl_cuci = '$Tgl_Cuci', tgl_selesai = '$Tgl_Selesai', jenisPemesanan = '$jenislayanan' WHERE id_pesan = $id_pesan";
        $result = mysqli_query($conn, $query);

        header('Location: dashboard.php');
    }
}
