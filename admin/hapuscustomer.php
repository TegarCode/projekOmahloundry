<?php
include 'koneksi.php';
$id_pelanggan = $_GET['id_pelanggan'];

$query = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: vPelanggan.php");
exit();
