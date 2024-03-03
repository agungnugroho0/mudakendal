<?php
session_start();
include_once("../../app/controllers/connect.php");
// cek login
error_reporting(0);
if ($_SESSION['status'] == "login") {
    header("location:../../public/admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo_muda_mudi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>

</head>

<body>
    <!-- shadow dihilangkan -->
    <div class="container-fluid">
        <nav class="navbar container-md">
            <div class="container-fluid">
                <a class="navbar-brand" href="../home">
                    <img src="../img/back_black.png" alt="kendal" height="35">
                </a>
            </div>
        </nav>
        <div class="container-md pt-3 ">
            <div class="container text-center">
                <img src="../img/login_ui.png" alt="gambar_login" style="width: 18rem;">
            </div>
            <div class="text-center container-sm text-center">
                <center>
                    <h1 class=" mt-4"><b>ٱلسَّلَامُ عَلَيْكُمْ </b></h1>
                    <form action="../../app/controllers/login.php" method="POST" class="mt-4">
                        <input type="text" name="username" placeholder="Username" class="form-control mb-3 border-top-0 border-start-0 border-end-0 border-2" style="width:21rem;">
                        <input type="password" name="password" placeholder="password" class="form-control mb-3 border-top-0 border-start-0 border-end-0 border-2" style="width:21rem;">
                        <button type="submit" class="btn btn-primary rounded-pill" style="width:21rem; background-color: #230d9e; border:none; height:50px">LOGIN</button>
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>

</html>