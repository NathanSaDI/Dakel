<?php 


if (!isset($_SESSION)) {
    session_start();
  
  }
  include("DatabaseConnection.php");

?>


<?php

if(isset($_POST["signup"])) {
    $immatriculation=$_POST["Immatriculation"];
    $marque=$_POST["Marque"];
    $color=$_POST["color"];
    $anne=$_POST["Annee"];
    $modele=$_POST["modele"];
          
    
    


    $sql = "SELECT id_Utilisateur from utilisateur WHERE Email = '" . $_SESSION["Email"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $id=$row['id_Utilisateur'];
    $_SESSION["Immatriculation"]=$immatriculation;
    $_SESSION["Marque"]=$marque;
    $_SESSION["color"]=$marque;
    $_SESSION["Annee"]=$anne;
    $_SESSION["modele"]=$modele;
     
    $sql1 = "SELECT immatriculation from vehicule WHERE immatriculation = '$immatriculation'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 =mysqli_fetch_array($result1, MYSQLI_ASSOC);
    
    $Nombre_ligne=mysqli_num_rows($result1);

if ($Nombre_ligne==0) {


    $resultat = mysqli_query($conn, "INSERT INTO vehicule(`immatriculation`, `id_Utilisateur`, `marque`, `modele`, `color`, `Anne`)
    VALUES ('$immatriculation', '$id', '$marque', '$modele', '$color', '$anne')");

} else {
  $errors="";
  $errors.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; font-family: "Montserrat";  "> Veuillez entrer un autre véhicule. </div>';
  $_SESSION["errors"]=$errors;
  header("location:Véhicul.php");
}


}



?>