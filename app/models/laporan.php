<?php
include_once "../controllers/connect.php";
session_start();
$tgl = $_SESSION['tgl'];
$result = array();
$sql    = mysqli_query($conn, "SELECT kelompok,count(kelamin) as cnt FROM absen WHERE kelamin = 'L' AND tanggal = '$tgl' GROUP BY kelompok");

while ($row = mysqli_fetch_assoc($sql)) {
    $count[] = $row;
}
// echo "laporan laki";

echo json_encode(array("result" => $count));
