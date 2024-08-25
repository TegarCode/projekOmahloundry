<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($conn, "select * from detail");
$html = '<center><h1>Data Detail Customer Laundry USA</h1></center><hr/><br><br><br><br>';
$html .= '<table border="1" width="100%">
<tr>
    <th>No.</th>
    <th>Identitas</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Telp</th>
    <th>Cuci</th>
    <th>Selesai</th>
    <th>Ambil</th>
    <th>Pemesanan</th>
</tr>';
$no = 1;

while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['nomor_identitas'] . "</td>
    <td>" . $row['namaCustomer'] . "</td>
    <td>" . $row['alamatCustomer'] . "</td>
    <td>" . $row['telpCustomer'] . "</td>
    <td>" . $row['tgl_cuci'] . "</td>
    <td>" . $row['tgl_selesai'] . "</td>
    <td>" . $row['pickup'] . "</td>
    <td>" . $row['jenisPemesanan'] . "</td>
   </tr>";
    $no++;
}

$html .= "</table></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$output = $dompdf->output();
$file_path = 'Data_Detail_Customer_Laundry_USA.pdf';

file_put_contents($file_path, $output);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download PDF</title>
</head>

<body>
    <h2>Data Detail Customer Laundry USA</h2>
    <p>File PDF telah disimpan. Silakan klik link berikut untuk mengunduh:</p>
    <a href="<?= $file_path; ?>" download>Download PDF</a>
    <?php
    echo "<script>setTimeout(function(){window.location.href='dashboard.php';},3000);</script>";
    ?>
</body>

</html>