<?php

require_once 'GajiHandler.php';

$obj = new GajiHandler($pdo);
$obj->saveData($_POST);

echo '<script>alert("Berhasil Tambah Data");window.location="gaji.php"</script>';
exit;
