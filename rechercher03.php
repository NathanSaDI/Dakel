<?php


if (!isset($_SESSION)) {
    session_start();
  
  }
  

  include("DatabaseConnection.php");
?>

<?php 

if(isset($_POST["signup"])) {

    $date=date('Y-m-d H:i:s');
    $idU=$_SESSION["utilisateurreserver"];
    $IdT=$_SESSION["trajet00"];
    echo $idU;
    echo $IdT;
    $resultat = mysqli_query($conn, "INSERT INTO réservation 
    VALUES ('$idU', '$IdT' ,'$date')");
    
    header("location:Acceuilofficiel1.php");

}
?>