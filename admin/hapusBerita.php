<?php
include 'koneksi.php';

$id_berita = $_GET['id_berita'];

$query_select = "SELECT foto FROM berita WHERE id_berita = '$id_berita'";
$result_select = mysqli_query($conn, $query_select);
$row = mysqli_fetch_assoc($result_select);
$foto = $row['foto'];

$filePath = './assets/img/' . $foto;
if (file_exists($filePath)) {
    unlink($filePath); 
}

$query_delete = "DELETE FROM berita WHERE id_berita = '$id_berita'";
$result_delete = mysqli_query($conn, $query_delete);

if ($result_delete) {
    header("Location: vBerita.php");
    exit();
} else {
    echo "Gagal menghapus data berita. Silakan coba lagi.";
}
