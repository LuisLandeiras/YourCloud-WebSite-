<?php
session_start();
$_SESSION['logged'] = false;
$_SESSION['UserName'] = "";
session_destroy();
header('location: ../register.php');
?>