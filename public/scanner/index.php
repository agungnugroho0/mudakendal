<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../app/features/node_modules/html5-qrcode/html5-qrcode.min.js" type="text/javascript"> </script>
    <script type="text/javascript" src="../../app/controllers/jquery.3.7.1.min.js"></script>
    <script type="text/javascript" src="../../app/features/timer.js"></script>

    <title>Scanner</title>
</head>

<body>


<?php 

?>

    <form name="" action=""><select name="sesi" id="sesi" >
        <option value=" " selected disabled hidden> Silahkan pilih sesi acara terlebih dahulu</option>
        <option value="1" >1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <!-- <button id="masuk" onclick="sesiku()">aaa</button> -->
    </form>
    <span id="hasil"></span>
    <div id="reader"></div>
</body>

</html>
<?php
include "../../app/features/scanner.php";
?>