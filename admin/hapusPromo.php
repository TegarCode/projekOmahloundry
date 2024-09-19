<?php
include 'koneksi.php';

// Periksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id_promo = $_GET['id'];

    // Cek koneksi database
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // Siapkan pernyataan SQL untuk menghapus data promo berdasarkan ID
    $query_delete = "DELETE FROM promo WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query_delete);

    if ($stmt === false) {
        die("Error saat mempersiapkan query SQL: " . mysqli_error($conn));
    }

    // Bind parameter ID promo
    mysqli_stmt_bind_param($stmt, "i", $id_promo);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: vPromo.php");
        exit();
    } else {
        echo "Gagal menghapus data promo. Error: " . mysqli_error($conn);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID promo tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($conn);
?>
