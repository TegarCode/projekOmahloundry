<?php
include 'koneksi.php';

if (isset($_GET['id_pesan'])) {
    $id_pesan = $_GET['id_pesan'];

    // Query untuk menghapus data dari tabel pesan berdasarkan id_pesan
    $sql = "DELETE FROM pesan WHERE id_pesan = '$id_pesan'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='dashboard.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID pesan tidak ditemukan";
}
