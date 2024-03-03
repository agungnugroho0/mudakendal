<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../../app/controllers/jquery.3.7.1.min.js"></script>
    <title>Masuk Data</title>
</head>
<body>
    <form method="post" class="form-user"> 
        <div>Nama :</div>
        <div><input type="text" name="nama" ></div>
        <div>Kelompok :</div>
        <div><select name="kelompok">
            <option value="Patean">Patean</option>
            <option value="Pageruyung">Pageruyung</option>
            <option value="Weleri">Weleri</option>
            <option value="Cepiring">Cepiring</option>
            <option value="Pesawahan">Pesawahan</option>
            <option value="Bangunsari 1">Bangunsari 1</option>
            <option value="Bangunsari 2">Bangunsari 2</option>
            <option value="Kendal">Kendal</option>
            <option value="Brangsong">Brangsong</option>
            <option value="Kebonadem">Kebonadem</option>
            <option value="Kaliwungu">Kaliwungu</option>
            <option value="Jatisari">Jatisari</option>
            <option value="Duduhan">Duduhan</option>
            <option value="Jatibarang">Jatibarang</option>
            <option value="Campurejo">Campurejo</option>
            <option value="Ngabean">Ngabean</option>
            <option value="Siroto">Siroto</option>
            </select>
        </div>
        <div>Tanggal Lahir :</div>
        <div><input type="date" name="tgl"></div>
        <div>Kelamin :</div>
        <div><input type="radio" name="kelamin" value="L">L</div>
        <div><input type="radio" name="kelamin" value="P">P</div>
        <button class="tombol-simpan">Simpan</button>
    </form>
</body>
</html>
<?php
// include "../../app/features/simpan.php";
?>
<script>
    $(document.ready(function() {
        $(".tombol-simpan").click(function() {
            var data = $('.form-user').serialize();
            console.log(data);
            $.ajax({
                type: 'post',
                url: '../../../app/models/simpan.php',
                data: data,
                success: function(data) {
                    load('tampil.php');
                }
            })
        })
    }))
</script>