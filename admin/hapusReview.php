<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = "DELETE FROM review WHERE id = '$id'";
$result = mysqli_query($conn, $query);

mysqli_close($conn);

header("Location: vReview.php");
exit();