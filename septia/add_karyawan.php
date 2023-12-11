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
    <h4>PT. HYBE BANGTAN SONYEONDAN</h4>
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

<section style="margin-top:60px;" class="content">
  <div class="title">
    <h4>Tambah Data Karyawan</h4>
  </div>
  <form action="./proses_add_karyawan.php" method="post">
    <div class="col-12">
      <label for="">NIK</label>
      <input type="number" class="input" name="nik" id="nik" required>
    </div>
    <div class="col-12">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="input" id="nama" name="nama_lengkap">
    </div>
      <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="input" id="alamat" name="alamat">
    </div>
    <div class="col-12">
        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
        <input type="text" class="input" id="gaji_pokok" name="gaji_pokok">
    </div>
    <button type="submit" class="btn_add col-2" >Simpan</button>
  </form>
</section>
  
<script src="./rupiah.js"></script>
</body>
</html>