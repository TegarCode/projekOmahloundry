<?php
include('koneksi.php');
require_once("vendor/autoload.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '<center><h3>Nota Pembelian</h3></center><hr/><br><br><br><br>';
$html .= '<table border="1" width="100%">
<tr>
    <th>No.</th>
    <th>No Identitas</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No_Hp</th>
    <th>Tgl Cuci</th>
    <th>Tgl Selesai</th>
    <th>Jenis layanan</th>
    <th>Pickup</th>
</tr>';

if (isset($_POST['No_Identitas'])) {
    $nomor_identitas = $_POST['No_Identitas'];
    $query = "SELECT * FROM pesan WHERE nomor_identitas = '$nomor_identitas'";
    $result = mysqli_query($conn, $query);

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $namaNota = "Nota_Laundry_" . $nomor_identitas . "_" . date("dmY");
        $html .= "<tr>
                <td>{$no}</td>
                <td>{$row['nomor_identitas']}</td>
                <td>{$row['namaCustomer']}</td>
                <td>{$row['alamatCustomer']}</td>
                <td>{$row['telpCustomer']}</td>
                <td>{$row['tgl_cuci']}</td>
                <td>{$row['tgl_selesai']}</td>
                <td>{$row['jenisPemesanan']}</td>
                <td>{$row['pickup']}</td>
            </tr>";
        $no++;
    }
}

$html .= "</table></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($namaNota . '.pdf');
