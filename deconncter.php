<?php
session_start();
$_SESSION['logged']=false;
session_destroy();
header("location:Acceuilofficiel1.php");
?>