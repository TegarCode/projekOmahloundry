<?php
include 'koneksi.php';

$id_kategori = $_GET['id_kategori'];

$query_select = "SELECT foto FROM kategori WHERE id_kategori = '$id_kategori'";
$result_select = mysqli_query($conn, $query_select);
$row = mysqli_fetch_assoc($result_select);
$foto = $row['foto'];

$filePath = './assets/kategori/' . $foto;
if (file_exists($filePath)) {
    unlink($filePath);
}

$query_delete = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
$result_delete = mysqli_query($conn, $query_delete);

if ($result_delete) {
    header("Location: vKategori.php");
    exit();
} else {
    echo "Gagal menghapus data Kategori. Silakan coba lagi.";
}
