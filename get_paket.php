<?php

require 'config/db_connect.php';

$sql = "SELECT * FROM paket";

$result = mysqli_query($conn, $sql);

$data_stok_barang = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>