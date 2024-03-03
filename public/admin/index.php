<?php
// persiapan
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo_muda_mudi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../css/styleku.css" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <nav class="navbar d-flex flex-row justify-content-beetween container-md">
        <div class="logo navbar-brand ms-4">
            <img src="../img/logo_mumi_putih.png" alt="muda_mudi_putih" height="35">
            <!-- <span class="ms-1 text-center fs-5">Muda Kendal</span> -->
        </div>
        <div class="keluar me-4">
            <a class="nav-link" href="../../app/controllers/logout.php">
                <img src="../img/power_off.png" alt="muda_mudi" height="35">
                <span class="ms-2 text-light"><b>LOGOUT</b></span>
            </a>
        </div>
    </nav>
    <!-- tombol fitur -->
    <main class="card mx-auto" style="background-color: #171a73; width:80%">
        <div class="card-body d-flex flex-wrap justify-content-around">
            <a href="" class="nav-link">
                <center>
                    <img src="../img/plus.png" alt="tambah" height="36" class="mb-2">
                    <div class="text-light fw-semibold">
                        <font size="2">Tambah</font>
                    </div>
                </center>
            </a>
            <a href="" class="nav-link">
                <center>
                    <img src="../img/scan.png" alt="tambah" height="40" class="mb-1">
                    <div class="text-light fw-semibold">
                        <font size="2">Scan</font>
                    </div>
                </center>
            </a>
            <a href="" class="nav-link">
                <center>
                    <img src="../img/document.png" alt="tambah" height="36" class="mb-2">
                    <div class="text-light fw-semibold">
                        <font size="2">Absensi</font>
                    </div>
                </center>
            </a>
        </div>
    </main>
    <!-- search -->
    <div class="d-flex mt-3 justify-content-center align-items-center">
        <form action="index.php" method="POST" class="rounded-pill ps-3 bg-light" style="height:2.5em">
            <input type="text" name="nama" id="pencarian" placeholder="Cari Nama Peserta" class="" type="search" aria-label="Search" role="search" style="width:16em;height:1.5em; border:none; background: none">
            <button type="submit" value="" class="btn"><img src='../img/find.png' height='30' class="pb-1"></button>
        </form>
    </div>
    <div class="">
        <?php
        if (isset($_POST['nama'])) {
            $nama = $_POST['nama'];
            // ambil tindakan 
            $ambildb = mysqli_query($conn, "select * from data where nama LIKE '%" . $nama . "%'");
            $cek = mysqli_num_rows($ambildb);
            if ($cek > 0) {
                while ($tampil = mysqli_fetch_array($ambildb)) { 
                    $lahir = new DateTime($tampil['tgl']);
                    $today =  new DateTime();
                    $umur = $today->diff($lahir); ?>
                    <div class="card mt-3">
                        <div class='card-body'>
                            <div class="card-title"><b><?php echo $tampil['nama'] ." | ". $tampil['kelompok']?></b></div>
                            <p class="text">
                                <?php echo $tampil['tgl']. " | ". $umur->y." Tahun";?>
                            </p>
                            <a href="#" class="card-link btn btn-primary"> Edit</a>
                            <a href="#" class="card-link btn btn-primary"> Hapus</a>
                        </div>
                    </div>
                    
                <?php 
                }
            } else {
                echo "<div class='text-center text-light mt-5 container-fluid'>
                <div><img src='../img/file_(1).png' height='170'></div>
                <div class='mt-3'><h5>Data Belum Tersedia, Amal Sholeh bisa ditambahkan dulu</h5></div>
                </div>";
            }
        }
        ?>
    </div>


</body>

</html>