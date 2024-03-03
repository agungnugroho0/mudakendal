<?php
include("../../app/controllers/connect.php");
include("../../app/features/phpqrcode/qrlib.php");
$id = $_GET['id_mumi'];
$ambil = mysqli_query($conn, "SELECT * FROM data WHERE id_mumi=$id");
$ambil2 = mysqli_query($conn, "SELECT * FROM data WHERE id_mumi=$id");

// pembuatan qr code
// isi qrcode yang ingin dibuat. akan muncul saat di scan
$isi = $id;
// nama folder tempat penyimpanan file qrcode
$penyimpanan = "temp/";
// membuat folder dengan nama "temp"
if (!file_exists($penyimpanan))
    mkdir($penyimpanan);
// perintah untuk membuat qrcode dan menyimpannya dalam folder temp
// atur pixel qrcode pada parameter ke 4
// atur margin/border di parameter ke 5
$tampil2 = mysqli_fetch_array($ambil2);
QRcode::png($isi, $penyimpanan . $tampil2['nama'] . "_" . $tampil2['kelompok'] . ".png", QR_ECLEVEL_L, 30);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo_muda_mudi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../css/styleku.css" rel="stylesheet">
    <title>QR CODE</title>
    
</head>

<body class="container">
    <nav class="navbar d-flex justify-content-beetween container-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home">
                <img src="../img/back.png" alt="kendal" height="35" class="align-text-top">
            </a>
            <div class="text-center fs-5 text-light"><b>MY QR CODE</b></div>
            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        </div>
    </nav>

    <div class="card text-center mt-3 d-flex justify-content-center container-md shadow-lg" style="width: 80%;">
        <div class="card-body pt-13 mb5 ">

            <?php
            while ($tampil = mysqli_fetch_array($ambil)) {
                echo "<p class='fs-6 fw-semibold'>" . $tampil['nama'];
                echo "<br>" . $tampil['kelompok'] . " | " . $tampil['kelamin'];
                // echo "kelamin : " . $tampil['kelamin'];
                $lahir = new DateTime($tampil['tgl']);
                $today = new DateTime();
                $umur = $today->diff($lahir);
                echo "<br><span class='text-primary'>" . $umur->y;
                echo " Tahun ";
                echo $umur->m;
                echo " Bulan ";
                echo $umur->d;
                echo " Hari</p>";
            }
            ?>
        
        
        <?php
        // menampilkan qrcode 
        echo '<img src="' . $penyimpanan . $tampil2['nama'] . "_" . $tampil2['kelompok'] . '.png" class="card-img-bottom" alt="barcode" style="width: 15rem;">';
        ?>
    </div>

</body>