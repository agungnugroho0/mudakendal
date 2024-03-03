<?php
session_start();
if (isset($_POST['simpan'])) {
    $_SESSION['tgl'] = $_POST['tgl'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type="text/javascript" src="../../app/controllers/jquery.3.7.1.min.js"></script> -->
    <title>Rekap Presensi</title>
</head>

<body>
    <form method="POST" action="">
        <input type="date" name="tgl" value="<?php if (isset($_SESSION['tgl'])) echo $_SESSION['tgl']; ?>">
        <button type="submit" name="simpan">FILTER</button>
        
    </form>
    
    <table border="1">
    </table>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>

</script>
<script type="text/javascript" src="../../app/features/report.js"></script>
<!-- <script type="text/javascript" src="../../app/features/report2.js"></script> -->