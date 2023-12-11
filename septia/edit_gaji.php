<?php
require_once 'function.php';
require_once 'GajiHandler.php';
if(isset($_GET['id'])){
  $obj = new GajiHandler($pdo);
  $data = $obj->singleData($_GET['id']);
}
?>

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


<section style="margin-top:60px; margin-bottom:100px;" class="content">
  <div class="title">
    <h4>Edit Data Gaji</h4>
  </div>


  <?php if($data[0]['jam_kerja']>48):?>
    <form action="./proses_edit_gaji.php" method="post">
      <input type="hidden" id="id" name="id" value="<?=$data['0']['id']?>">
      <div class="col-12">
        <label for="">NIK</label>
        <input type="text" class="input" name="nik" id="nik" required readonly value="<?=$data[0]['nik']?>"> 
      </div>
      <div class="col-12">
          <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
          <input type="text" class="input" id="gaji_pokok" name="gaji_pokok" readonly value="<?= rupiah($data[0]['gaji_pokok'])?>">
      </div>
      <div class="col-12" id="col_jam">
        <label for="jam_kerja" class="form-label">Jam Kerja</label>
        <input type="number" class="input" id="jam_kerja" name="jam_kerja" required value="<?=$data[0]['jam_kerja']?>">
      </div>
      <div class="col-12 " id="col_upah">
        <label for="upah_lembur" class="form-label">Upah Lembur</label>
        <input type="number" class="input" id="upah_lembur" name="upah_lembur" placeholder="ex : 15% tuliskan 15 saja" value="<?=$data[0]['upah_lembur']?>">
      </div>
      <button type="button" class="btn_hitung col-2" id="hitung">Hitung</button>
      <div class="col-12">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="input" id="date" name="date" required value="<?=$data[0]['date']?>">
      </div>
      <div class="col-12">
        <label for="total" class="form-label">Total</label>
        <input type="text" class="input" id="total" name="total" readonly required value="<?= rupiah($data[0]['total'])?>">
      </div>
      <button type="submit" class="btn_add col-2" >Simpan</button>
   </form>
  <?php else:?>
   <form action="./proses_edit_gaji.php" method="post">
   <input type="hidden" id="id" name="id" value="<?=$data['0']['id']?>">
    <div class="col-12">
      <label for="">NIK</label>
      <input type="text" class="input" name="nik" id="nik" required readonly value="<?=$data[0]['nik']?>"> 
    </div>
    <div class="col-12">
        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
        <input type="text" class="input" id="gaji_pokok" name="gaji_pokok" readonly value="<?= rupiah($data[0]['gaji_pokok'])?>">
    </div>
    <div class="col-12" id="col_jam">
      <label for="jam_kerja" class="form-label">Jam Kerja</label>
      <input type="number" class="input" id="jam_kerja" name="jam_kerja" required value="<?=$data[0]['jam_kerja']?>">
    </div>
    <div class="col-12 d-none" id="col_upah">
      <label for="upah_lembur" class="form-label">Upah Lembur</label>
      <input type="number" class="input" id="upah_lembur" name="upah_lembur" placeholder="ex : 15% tuliskan 15 saja" value="<?=$data[0]['upah_lembur']?>">
    </div>
     <button type="button" class="btn_hitung col-2" id="hitung">Hitung</button>
    <div class="col-12">
      <label for="date" class="form-label">Date</label>
      <input type="date" class="input" id="date" name="date" required value="<?=$data[0]['date']?>">
    </div>
    <div class="col-12">
      <label for="total" class="form-label">Total</label>
      <input type="text" class="input" id="total" name="total" readonly required value="<?= rupiah($data[0]['total'])?>">
    </div>
    <button type="submit" class="btn_add col-2" >Simpan</button>
  </form>
  <?php endif;?>

</section>
  
<script src="./main.js"></script>
</body>
</html>