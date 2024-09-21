<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$isi_review = $_POST['isi_review'];
$rating = $_POST['rating'];

$conn->begin_transaction();

try {
    $sql_review = "INSERT INTO review (nama, isi_review, rating) 
                  VALUES ('$nama', '$isi_review', '$rating')";

    $result_review = $conn->query($sql_review);

    if ($result_review && $result_review) {
        $conn->commit();
        echo "<script>alert('Review berhasil dikirim!'); window.location.href='index.php';</script>";
    } else {
        throw new Exception("Error: " . $conn->error);
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Review gagal dikirim: " . $e->getMessage();
}
