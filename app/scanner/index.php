<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../app/features/node_modules/html5-qrcode/html5-qrcode.min.js" type="text/javascript"> </script>
    <script type="text/javascript" src="../../app/controllers/jquery.3.7.1.min.js"></script>
    <script type="text/javascript" src="../../app/features/timer.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../css/styleku.css" rel="stylesheet">
    
    <title>Scanner</title>
</head>

<body>


<?php 

?>
    <div class="container-sm">
        <!-- <form name="" action=""><select name="sesi" id="sesi" >
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
       
        </form> -->
        <span id="hasil"></span>
        <div id="reader"></div>


    </div>
</body>

</html>
<?php
include "../../app/features/scanner.php";
?>