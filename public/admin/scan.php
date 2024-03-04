<?php
// persiapan
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}
?>
<nav class="navbar d-flex flex-row justify-content-beetween container-md">
        <div class="logo navbar-brand ms-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/back.png" alt="kendal" height="35">
                </a>
            </div>
        </div>
        <div class="keluar me-4">
            <a class="nav-link" href="../../app/controllers/logout.php">
                <img src="../img/power_off.png" alt="muda_mudi" height="35">
                <span class="ms-2 text-light"><b>LOGOUT</b></span>
            </a>
        </div>
    </nav>
<?php
    include "../../app/scanner/index.php";
?>