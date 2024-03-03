<?php
// tangkap username dan password sekaligus enkripsi
include "connect.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

// aktifkan sesi
session_start();

// cek di db
$login = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama='$username' AND pass='$password'");
// hitung jumlah data
$cek = mysqli_num_rows($login);
// cek jumlah data
if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header("location:../../public/admin/index.php");
} else {
    header("location:../../public/login/index.php");
}
