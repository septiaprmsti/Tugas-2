<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/2f708729c7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css?<?php echo time();?>">
</head>
<body>

<!-- Header -->
<header>
    <h4>Sistem Karyawan</h4>
    <h4>PT MAJU MUNDUR JAYA</h4>
</header>
<!-- end Header -->

<!-- navbar -->
<nav>
  <a class="active" aria-current="page" href="./index.php">
    <i class="fa-solid fa-user"></i>
      <span>Data Karyawan</span>
  </a>
  <a class="" href="./gaji.php">
    <i class="fa-solid fa-money-bill-wave"></i>
      <span>Data Gaji</span>
  </a>
</nav>
<!-- end navbar -->



<?php 

require_once 'GajiHandler.php';
require_once 'function.php';
$obj = new GajiHandler($pdo);
$datas = $obj->displayAllData();
?>

<!-- section content -->
<section style="margin-top:60px;" class="content">
  <div class="title">
    <h4>Table Data Gaji</h4>
  </div>
  <table id="table">
  <tr>
    <th>No</th>
    <th>NIK</th>
    <th>Jam Kerja</th>
    <th>Upah Lembur</th>
    <th>Total</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php if(!empty($datas)):?>
  <?php $no=1;?>
  <?php foreach($datas as $data):?>
  <tr>
    <td><?=$no?></td>
    <td><?=$data['nik']?></td>
    <td><?=$data['jam_kerja']?></td>
    <td><?=$data['upah_lembur']?>%</td>
    <td><?=rupiah($data['total']) ?></td>
    <td><?=$data['date']?></td>
    <td>
      <a href="./edit_gaji.php?id=<?=$data['id']?>" class="btn_hitung">Edit</a>
    </td>
  </tr>
  <?php $no++?>
  <?php endforeach;?>
  <?php endif;?>
  
</table>
</section>
<!-- end content -->
  
</body>
</html>