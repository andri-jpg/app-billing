<?php

require 'config/db_connect.php';

$sql = "SELECT * FROM masuk";

$result = mysqli_query($conn, $sql);

$data_pelanggan = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>