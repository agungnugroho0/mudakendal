<?php include("../../app/controllers/connect.php"); ?>

<head>
    <script type="text/javascript" src="../../app/controllers/jquery.3.7.1.min.js"></script>

    <title>Absensi</title>
</head>


<div class="container mt-3">
    <form action="index.php" method="POST" class=" d-flex position-relative border-2 bg-white rounded-pill" role="search">
        <input type="text" name="nama" id="pencarian" placeholder="Cari Nama" class="form-control border border-0 rounded-pill" type="search" aria-label="Search" required>
        <button type="submit" value="" class="btn"><img src='../img/find.png' height='25'></button>
    </form>

    <?php
    // dapatkan form nama
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        // ambil tindakan 
        $ambildb = mysqli_query($conn, "select * from data where nama LIKE '%" . $nama . "%'");
        $ambildb2 = mysqli_query($conn, "select * from data where nama LIKE '%" . $nama . "%'");
        //percabangan jika tidak ada data
        if (mysqli_fetch_row($ambildb) == 0) {
            echo "<div class='text-center text-light mt-5'>
                    <div><img src='../img/file_(1).png' height='200'></div>
                    <div class='mt-3'><h4>Data Belum Tersedia, Amal Sholeh Hubungi Pengurus</h4></div>
                    </div>";
        }

        //jika ada maka
        while ($tampil = mysqli_fetch_array($ambildb2)) {
            echo "<div class='card mt-3 d-flex flex-row'>
                <div class='card-body pt-13 mb5'>
                    <div class='card-title fs-5'> ";
            echo $tampil['nama'];
            echo "</div>";
            echo "<h6 class='mb-2 text-body-secondary'>" . $tampil['kelompok'] . "</h6>";
            echo "</div>";
            echo "<div class='card-body pt-13 text-end align-self-center '>";

            echo "<a href='../personal/detail.php?id_mumi=" . $tampil['id_mumi'] . "'><img src='../img/dots_three.png' width='40'></a>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>

</div>
</body>
</html>