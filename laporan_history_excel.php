<?php

require 'config/db_connect.php';

$filename = "laporan_history-(". date('d-m-Y') .").xls";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");

$sql = "SELECT tanggal, namapelanggan, namapaket, harga FROM history";

$result = mysqli_query($conn, $sql);

?>
<h2>Laporan History Tagihan</h2>
<table border="1" cellpadding="10" cellspacing="0" style="margin: 0 auto;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Pelunasan</th>
            <th>Nama Pelanggan</th>
            <th>Nama Paket</th>
            <th>Total Pembayaran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?= $no++; ?></td>
<td><?= date('d/m/Y H:i', strtotime($data['tanggal'])); ?></td>
<td><?= $data['namapelanggan']; ?></td>
<td><?= $data['namapaket']; ?></td>
<td><?= $data['harga']; ?></td>
<td>Lunas</td>

        </tr>
        <?php } ?>
    </tbody>
</table>
