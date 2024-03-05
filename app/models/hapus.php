<?php
include ("../../app/controllers/connect.php");
$id_mumi = $_GET['id_mumi'];
mysqli_query($conn,"DELETE FROM data WHERE id_mumi='$id_mumi'");
header("location:index.php?pesan=hapus");