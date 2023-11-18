<?php
if (!isset($_SESSION)) {
    session_start();
  
  }
  include("DatabaseConnection.php");


  if(isset($_SESSION['logged']) ) {

    if ( isset($_POST["signup"])) {

      $Destination=$_POST["Destinationreserver"];
      $depart=$_POST["departreserver"];
      $date=$_POST["datereserver"];
      
      $_SESSION["Destinationreserver"]=$Destination;
      $_SESSION["departreserver"]=$depart;
      $_SESSION["datereserver"]=$date;
      
      // header("location:rechercher2.php");
      
      $email=$_SESSION["Email"];
      $resultat = mysqli_query($conn, "SELECT id_Utilisateur FROM utilisateur WHERE Email='$email'") ;
      $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
      $id_utilisateur=$row1["id_Utilisateur"];
     $_SESSION["id555"]=$id_utilisateur;
      $sql = "SELECT * FROM trajet WHERE Ville_Depart LIKE '%" . $_SESSION["departreserver"] . "%' AND Ville_Arrive LIKE '%" . $_SESSION["Destinationreserver"] . "%' AND Date_Depart>='" . $_SESSION["datereserver"] . "' AND id_Utilisateur not in ('$id_utilisateur') ";
      $result = mysqli_query($conn, $sql);
      $nbr_ligne = mysqli_num_rows($result);
            header("location:rechercher2.php");
      
      }
      
   
}
else {
  $_SESSION["rechercher"]=1;
    header("location:connexion.php");


}










?>