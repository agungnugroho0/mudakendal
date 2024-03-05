<?php
include "../controllers/connect.php";
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}
// tangkap properti
$id_mumi = $_POST['id_mumi'];
$tgl = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$sesi = $_POST['sesi'];

// cek absen
$cekdb = mysqli_query($conn, "SELECT * FROM absen WHERE id_mumi ='$id_mumi' AND tanggal ='$tgl' AND sesi ='$sesi'");
$cek = mysqli_num_rows($cekdb);
if ($cek >0){
  echo "absensi sudah ada";
} else {
// ambil nama di db
  $ambildb = mysqli_query($conn, "select * from data where id_mumi ='$id_mumi'");
  while ($tampil = mysqli_fetch_array($ambildb)) {
      $nama = $tampil['nama'];
  $kelompok = $tampil['kelompok'];
  $kelamin = $tampil['kelamin'];
}

//buat id_abs
$absen = mysqli_query($conn, "SELECT max(id_abs) as angka from absen");
$tampilan = mysqli_fetch_array($absen);
$absensi = $tampilan['angka'];
$urutan = $absensi;
$urutan++;

// insert data
$sql = "INSERT INTO absen (id_abs,tanggal,waktu,id_mumi,nama,kelompok,sesi,kelamin) VALUES ('$urutan','$tgl','$waktu','$id_mumi','$nama','$kelompok','$sesi','$kelamin')";
if (mysqli_query($conn, $sql)) {
  echo "Absen Sudah dimasukan";
  // echo $hasil;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
