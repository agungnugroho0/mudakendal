<?php
include '../controllers/connect.php';
$nama = $_POST['nama'];
$kelompok = $_POST['kelompok'];
$tgl = $_POST['tgl'];
$kelamin = $_POST['kelamin'];
mysqli_query($conn,"INSERT INTO data values ('','$nama','$kelompok','$tgl','$kelamin')");
mysqli_close($conn);
?>