<?php
include '../controllers/connect.php';
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}


// tangkap properti
$nama = $_POST['nama'];
$kelompok = $_POST['kelompok'];
$tgl = $_POST['tgl'];
$kelamin = $_POST['kelamin'];

// buat id_mumi
$idmumi = mysqli_query($conn, "SELECT max(id_mumi)as kode from data");
$idmumitampil = mysqli_fetch_array($idmumi);
$unik = $idmumitampil['kode'];
$unik++;

mysqli_query($conn,"INSERT INTO data values ('$unik','$nama','$kelompok','$tgl','$kelamin')");
header("location:../../public/admin/index.php?pesan=input");
mysqli_close($conn);
// echo "hello";
?>