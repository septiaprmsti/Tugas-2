<?php

require_once 'KaryawanHandler.php';

$obj = new KaryawanHandler($pdo);
$obj->saveData($_POST);

echo '<script>alert("Berhasil Tambah Data");window.location="index.php"</script>';
exit;
