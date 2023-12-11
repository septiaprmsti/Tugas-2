<?php

include 'dbconnect.php';

class KaryawanHandler {
  private $nik;
  private $nama_lengkap;
  private $gaji_pokok;
  private $alamat;
  private $pdo;


  public function __construct($pdo){
    $this->pdo =$pdo;
  }

  public function displayAllData(){
    $stmt = $this->pdo->query("SELECT * FROM user");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveData($data){
    $this->nik = $data['nik'];
    $this->nama_lengkap = $data['nama_lengkap'];
    $this->alamat =$data['alamat'];
    $this->gaji_pokok = filter_var($data['gaji_pokok'], FILTER_SANITIZE_NUMBER_INT);
		
		$datas[] = $this->nik;
		$datas[] = $this->nama_lengkap;
		$datas[] = $this->alamat;
		$datas[] = $this->gaji_pokok;
		
		$sql = 'INSERT INTO user (nik,nama_lengkap,alamat,gaji_pokok)VALUES (?,?,?,?)';
		$row = $this->pdo->prepare($sql);
		$row->execute($datas);
  }

  public function singleData($nik){
    $stmt = $this->pdo->query("SELECT nik,nama_lengkap,gaji_pokok FROM user WHERE nik = $nik");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}