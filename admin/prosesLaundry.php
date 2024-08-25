<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['status_laundry'], $_POST['id_pesan'])) {
        $id_pesan = $_POST['id_pesan'];
        $status_laundry = $_POST['status_laundry'];

        $query_update = "UPDATE pesan SET status_laundry = ? WHERE id_pesan = ?";
        $stmt = mysqli_prepare($conn, $query_update);
        mysqli_stmt_bind_param($stmt, "ii", $status_laundry, $id_pesan);
        $result_update = mysqli_stmt_execute($stmt);

        if ($result_update) {
            header("Location: vTransaksi.php");
        } else {
            echo "Gagal update data pesanan laundry, silahkan coba lagi!";
        }
    } else {
        echo "Data yang dibutuhkan tidak lengkap.";
    }
}
