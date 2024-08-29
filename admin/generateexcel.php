<?php
include 'koneksi.php';

// Ambil data dari database
$query = mysqli_query($conn, "SELECT nomor_identitas, namaCustomer, alamatCustomer, telpCustomer, tgl_cuci, tgl_selesai, pickup, jenisPemesanan FROM detail");

// Tentukan nama file
$filename = 'Report_Data_Pembelian.csv';

// Buka file untuk penulisan
$file = fopen($filename, 'w');

// Tulis header kolom
$header = array('No', 'Identitas', 'Nama', 'Alamat', 'No HP', 'Tgl Terima', 'Tgl Selesai', 'Ambil', 'Pemesanan');
fputcsv($file, $header);

// Isi data ke dalam file CSV
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $data = array(
        $no,
        $row['nomor_identitas'],
        $row['namaCustomer'],
        $row['alamatCustomer'],
        $row['telpCustomer'],
        $row['tgl_cuci'],
        $row['tgl_selesai'],
        $row['pickup'],
        $row['jenisPemesanan']
    );
    fputcsv($file, $data);
    $no++;
}

// Tutup file
fclose($file);

// Set header untuk memaksa browser mengunduh file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $filename);

// Baca file CSV dan keluarkan ke output
readfile($filename);

// Hapus file CSV setelah diunduh
unlink($filename);

// Redirect ke dashboard setelah beberapa detik
echo "<script>setTimeout(function(){window.location.href='dashboard.php';},3000);</script>";
