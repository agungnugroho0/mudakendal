<?php
session_start();
session_destroy();
header("location:../../public/login/index.php");