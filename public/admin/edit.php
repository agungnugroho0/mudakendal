<?php
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}

// tangkap properti
$id_mumi = $_GET['id_mumi'];
$ambildb = mysqli_query($conn, "select * from data where id_mumi ='$id_mumi'");
while ($tampil= mysqli_fetch_array($ambildb)){

$klp = ['Patean', 'Pageruyung', 'Weleri', 'Cepiring', 'Pesawahan', 'Bangunsari 1', 'Bangunsari 2', 'Kendal', 'Brangsong', 'Kebonadem', 'Kaliwungu', 'Jatisari', 'Duduhan', 'Jatibarang', 'Campurejo', 'Ngabean', 'Siroto'];
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

    <main>
        <div class="container-md">
            <!-- form -->
            <form class="form-control" method="post" action="../../app/models/update.php">
                <input type="hidden" class="form-control" id="floatingInput" name="id_mumi" value="<?php echo $tampil['id_mumi']?>" >
                <div class="form-floating mb-3 mt-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="nama" value="<?php echo $tampil['nama']?>">
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput1" name="tgl" value="<?php echo $tampil['tgl']?>">
                    <label for="floatingInput1">Tanggal Lahir</label>
                </div>
                <div class="form-control" >
                    Jenis Kelamin <br>
                    <input type="radio" name="kelamin" id="L" value="L" class="" <?php if($tampil['kelamin']=="L"){echo "checked";}?>>
                    <label class="form-check-label" for="L">Laki - Laki</label>
                    &nbsp;
                    <input type="radio" name="kelamin" id="P" value="P" <?php if($tampil['kelamin']=="P"){echo "checked";}?>>
                    <label class="form-check-label" for="P">Perempuan</label>
                    
                </div>
                <div class="form-floating mt-3">

                    <select name="kelompok" class="form-select" id="floating-select" aria-label="Floating label select" value="<?php echo $tampil['kelompok']?>">
                        <?php
                    foreach ($klp as $klp){
                        if ($klp == $tampil['kelompok']){
                            echo "<option value='".$klp."' selected>".$klp."</option>";
                        }
                        if($klp != $tampil['kelompok']){
                            echo "<option value='".$klp."'>".$klp."</option>";
                        }
                        
                    }
                    ?> 
                </select>
                <label for="floating-select">Nama Kelompok</label>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" value="KIRIM" class="btn btn-primary mt-3 mb-3 "> UBAH </button>
            </div>
            </form>
        </div>
    </main>
</body>
<?php }?>
</html>