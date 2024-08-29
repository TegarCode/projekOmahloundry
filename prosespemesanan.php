<?php
include 'koneksi.php';

$No_Identitas = $_POST['No_Identitas'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$No_Hp = $_POST['No_Hp'];
$Tgl_Ambil = $_POST['Tgl_Ambil'];
$Tgl_Cuci = $_POST['Tgl_Cuci'];
$ambil = $_POST['ambil'];
$jenislayanan = $_POST['jenislayanan'];

$conn->begin_transaction();

try {
    $sql_pesan = "INSERT INTO pesan (nomor_identitas, namaCustomer, alamatCustomer, telpCustomer, tgl_cuci, tgl_selesai, pickup, jenisPemesanan) 
                  VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp', '$Tgl_Cuci', '$Tgl_Ambil', '$ambil', '$jenislayanan')";

    $result_pesan = $conn->query($sql_pesan);
    $sql_pelanggan = "INSERT INTO pelanggan (nomor_identitas, namaPelanggan, alamatPelanggan, telpPelanggan) 
                      VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp')";

    $result_pelanggan = $conn->query($sql_pelanggan);

    if ($result_pesan && $result_pelanggan) {
        $conn->commit();
        echo "<script>alert('Lihat Data Anda? Ingat nomor Identitas Anda => " . $No_Identitas . "'); window.location.href='lacak.php';</script>";
    } else {
        throw new Exception("Error: " . $conn->error);
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Transaksi gagal: " . $e->getMessage();
}
