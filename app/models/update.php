<?php
include ("../controllers/connect.php");
$id_mumi = $_POST['id_mumi'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$kelamin = $_POST['kelamin'];
$kelompok = $_POST['kelompok'];

mysqli_query($conn,"UPDATE data SET nama='$nama',kelompok='$kelompok',tgl='$tgl',kelamin='$kelamin' WHERE id_mumi='$id_mumi'");

header("location:../../public/admin/index.php?pesan=update");
mysqli_close($conn);