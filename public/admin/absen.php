<?php
session_start();
include_once("../../app/controllers/connect.php");

// cek login
if ($_SESSION['status'] != "login") {
    header("location:../../public/login/index.php");
}

// filter tanggal
if (isset($_POST['filter'])) {
    $tgl = $_POST['tgl'];
    $sesi = $_POST['sesi'];
} else {
    $tgl = '';
    $sesi = '1';
}
//array kelompok
$klp = ['Patean', 'Pageruyung', 'Weleri', 'Cepiring', 'Pesawahan', 'Bangunsari 1', 'Bangunsari 2', 'Kendal', 'Brangsong', 'Kebonadem', 'Kaliwungu', 'Jatisari', 'Duduhan', 'Jatibarang', 'Campurejo', 'Ngabean', 'Siroto'];

// $tgl = '';

$grandtotal = mysqli_query($conn, "SELECT *, COUNT(kelamin) as cnt FROM absen WHERE tanggal = '$tgl' AND sesi='$sesi'");
$grandputra = mysqli_query($conn, "SELECT *, COUNT(kelamin) as cnt FROM absen WHERE tanggal = '$tgl' AND sesi='$sesi' AND kelamin='L'");
$grandputri = mysqli_query($conn, "SELECT *, COUNT(kelamin) as cnt FROM absen WHERE tanggal = '$tgl' AND sesi='$sesi' AND kelamin='P'");
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

    <div class="container-md mt-1">

        <form method="POST" class="container-md">
            <input type="date" name="tgl" value="<?php if (isset($_POST['tgl'])) echo $_POST['tgl']; ?>" class="btn btn-light">
            <!-- <select name="sesi" hidden>
                <option value="1" selected>1</option>
                <option value="2">2</option>
            </select> -->
            <input type="hidden" name="sesi" value="1">
            <button type="submit" name="filter" class="btn btn-warning">FILTER</button>
        </form>
        <div class="container-md">
            <div class="card mb-1 ps-2 pt-2 pb-2">
                <div class="card-title">
                    <h4>Laporan Absensi</h4>
                </div>
                <!-- kontainer untuk rekap kartu atas -->
                <div class="d-flex justify-content-start">
                    <div class="ms-2">
                        <p class="badge text-bg-primary ">
                            Putra <br>
                            <span class="fs-1"> <?php echo mysqli_fetch_array($grandputra)['cnt']; ?></span>
                        </p>
                    </div>
                    <div class="ms-2">
                        <p class="badge text-bg-primary ">
                            Putri <br>
                            <span class="fs-1"> <?php echo mysqli_fetch_array($grandputri)['cnt']; ?></span>
                        </p>
                    </div>
                    <div class="ms-2">
                        <p class="badge text-bg-warning ">
                            Total Kehadiran <br>
                            <span class="fs-1"> <?php echo mysqli_fetch_array($grandtotal)['cnt']; ?></span>
                        </p>
                    </div>

                </div>
            </div>

            <!-- tabel detail absensi -->
            <table class="table">
                <th>Kelompok</th>
                <th>Laki - Laki</th>
                <th>Perempuan</th>
                <th>Jumlah</th>

                <!-- menampilkan laporan -->
                <?php
                foreach ($klp as $klp) {
                    // ambil db berdasarkan kelamin dan tanggal dan pengulangan kelompok
                    $sqlcowo    = mysqli_query($conn, "SELECT *,count(kelamin) as cnt FROM absen WHERE kelompok= '$klp' AND tanggal = '$tgl' AND kelamin='L' AND sesi='$sesi'");
                    $sqlcewe    = mysqli_query($conn, "SELECT *,count(kelamin) as cnt FROM absen WHERE kelompok= '$klp' AND tanggal = '$tgl' AND kelamin='P' AND sesi='$sesi'");
                    $sqltotal    = mysqli_query($conn, "SELECT *,count(kelamin) as cnt FROM absen WHERE kelompok= '$klp' AND tanggal = '$tgl' AND sesi='$sesi'");
                    echo "<tr><td>" . $klp . "</td>";

                    while ($row = mysqli_fetch_array($sqlcowo)) {
                        echo "<td>" . $row['cnt'] . "</td>";
                    }
                    while ($row = mysqli_fetch_array($sqlcewe)) {
                        echo "<td>" . $row['cnt'] . "</td>";
                    }
                    while ($row = mysqli_fetch_array($sqltotal)) {
                        echo "<td>" . $row['cnt'] . "</td>";
                    }
                }

                echo "</tr>";
                ?>

            </table>
        </div>
    </div>
</body>

</html>