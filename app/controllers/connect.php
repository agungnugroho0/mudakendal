
<?php
$servername = "103.147.154.185";
$database = "wagungnu_mudakendal";
$username = "wagungnu_admin";
$password = "bapakDjokam354";
 
// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";

?>