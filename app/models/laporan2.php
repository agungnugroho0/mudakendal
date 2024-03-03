<?php
include_once "../controllers/connect.php";
session_start();
$tgl = $_SESSION['tgl'];
$result2 = array();
$sql2    = mysqli_query($conn, "SELECT kelompok,count(kelamin) as cnt FROM absen WHERE kelamin = 'P' AND tanggal = '$tgl' GROUP BY kelompok");


while ($row1 = mysqli_fetch_assoc($sql2)) {
    $count2[] = $row1;
}

echo json_encode(array("result2" => $count2));
