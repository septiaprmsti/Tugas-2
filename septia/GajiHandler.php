<?php

include 'dbconnect.php';

class GajiHandler {

  private $id;
  private $nik;
  private $jam_kerja;
  private $upah_lembur;
  private $total;
  private $date;
  private $pdo;


  public function __construct($pdo){

    $this->pdo =$pdo;
  }

  public function displayAllData(){
    $stmt = $this->pdo->query("SELECT * FROM gaji");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveData($data){
    $this->nik = $data['nik'];
    $this->jam_kerja = $data['jam_kerja'];
    if($data['upah_lembur']==''){
      $this->upah_lembur =0;
    }else{
      $this->upah_lembur =$data['upah_lembur'];
    }
    $this->date =$data['date'];
    $this->total = filter_var($data['total'], FILTER_SANITIZE_NUMBER_INT);
		
		$datas[] = $this->nik;
		$datas[] = $this->jam_kerja;
		$datas[] = $this->upah_lembur;
		$datas[] = $this->total;
		$datas[] = $this->date;
		
		$sql = 'INSERT INTO gaji (nik,jam_kerja,upah_lembur,total,date)VALUES (?,?,?,?,?)';
		$row = $this->pdo->prepare($sql);
		$row->execute($datas);
  }
  
  public function singleData($id){
    $stmt = $this->pdo->query("SELECT* FROM gaji as g LEFT JOIN user as u ON g.nik=u.nik WHERE g.id =$id;");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateData($data){
    $this->id = intval($data['id']);
    $this->nik = $data['nik'];
    $this->jam_kerja = $data['jam_kerja'];

    if($data['upah_lembur']=='0'){
      $this->upah_lembur =0;
    }else{
      $this->upah_lembur =$data['upah_lembur'];
    }
    $this->date =$data['date'];
    $this->total = filter_var($data['total'], FILTER_SANITIZE_NUMBER_INT);
		
	
		$datas[] = $this->nik;
		$datas[] = $this->jam_kerja;
		$datas[] = $this->upah_lembur;
		$datas[] = $this->total;
		$datas[] = $this->date;
    $datas[] = $this->id;

    $sql = 'UPDATE gaji SET nik=?,jam_kerja=?,upah_lembur=?,total=?,date=? WHERE id=?';
		$row = $this->pdo->prepare($sql);
		$row->execute($datas);
  }
}

