<?php 

if (!isset($_SESSION)) {
  session_start();

}


  if(isset($_POST["signup"])) {

  $nombre_passager=$_POST["numbre"];
  $participation=$_POST["Participation"];
  $cigarette=$_POST["cigarette"];
  $prise_electrique=$_POST["priseelectrique"];
  $climatisation=$_POST["Climatisation"];
  
 $_SESSION["nombre_passager"]=$nombre_passager;
 $_SESSION["participation"]=$participation;
 $_SESSION["cigarette"]=$cigarette;
 $_SESSION["priseelectrique"]=$prise_electrique;
 $_SESSION["Climatisation"]=$climatisation;


header("location:publiertrajet5.php");


   }



?>