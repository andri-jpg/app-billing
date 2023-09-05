<?php 
ob_start();
require 'config/db_connect.php';
require_once 'assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$semuaAnggota = [];
$sqlAnggota = $conn->query("SELECT * FROM history") or die(mysqli_error($conn));
while ($pecahAnggota = $sqlAnggota->fetch_assoc()) {
	$semuaAnggota[] = $pecahAnggota;
}
// $jk = ($pecahAnggota['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan';


$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Export to PDF Anggota</title>
</head>
<body>
<h2>Laporan History Tagihan</h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
		<th>No</th>
		<th>Tanggal Pelunasan</th>
		<th>Nama Pelanggan</th>
		<th>Nama Paket</th>
		<th>Total Pembayaran</th>
		<th>Status</th>
  	</tr>';
  	$no = 1;
  	foreach($semuaAnggota as $key => $value) {
  		$html .= '
							<tr>
								<td>'. $no++ .'</td>
								<td>'. $value["tanggal"] .'</td>
								<td>'. $value["namapelanggan"] .'</td>
								<td>'. $value["namapaket"] .'</td>
								<td>'. $value["harga"] .'</td>
								<td>'. 'Lunas' .'</td>
							</tr>

  					';
  	}
$html .= '
</table>
</body>
</html>';

$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output();


?>
