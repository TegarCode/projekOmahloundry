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
$Kode_Promo = isset($_POST['Kode_Promo']) ? $_POST['Kode_Promo'] : ''; // Mengambil nilai kode promo jika ada

$error_Kode_Promo = "";
$diskon = 0; // Inisialisasi variabel diskon

// Cek apakah kode promo diisi
if (!empty($Kode_Promo)) {
    $sql_kode_promo = "SELECT * FROM promo WHERE kode_promo = '$Kode_Promo' AND valid = 1";
    $result_kode_promo = $conn->query($sql_kode_promo);
    
    if ($result_kode_promo->num_rows == 0) {
        // Jika kode promo tidak valid atau sudah kadaluarsa
        $error_Kode_Promo = "Kode promo tidak valid atau sudah kadaluarsa.";
        echo "<script>alert('$error_Kode_Promo'); window.history.back();</script>";
        exit; // Menghentikan eksekusi jika kode promo tidak valid
    } else {
        // Jika kode promo valid, ambil data promo
        $promo_data = $result_kode_promo->fetch_assoc();
        $diskon = $promo_data['diskon']; // Ambil nilai diskon
    }
}

$conn->begin_transaction();

try {
    $sql_pesan = "INSERT INTO pesan (nomor_identitas, namaCustomer, alamatCustomer, telpCustomer, tgl_cuci, tgl_selesai, pickup, jenisPemesanan, kode_promo, diskon) 
                  VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp', '$Tgl_Cuci', '$Tgl_Ambil', '$ambil', '$jenislayanan', '$Kode_Promo', '$diskon')";

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
?>
