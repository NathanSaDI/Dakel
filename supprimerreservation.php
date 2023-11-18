<?php 

if (!isset($_SESSION)) {
    session_start();
  
  }
  include("DatabaseConnection.php");
  ?>
  <?php
  if (isset($_GET['id_trajet'])) {
    $id_trajet = $_GET['id_trajet'];
    $_SESSION["trajet_supprimer"]=$id_trajet;
  

  }

 

     $email=$_SESSION["Email"];
     $resultat = mysqli_query($conn, "SELECT * FROM utilisateur WHERE Email='$email'") ;
     $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
     $id_utilisateur=$row1["id_Utilisateur"];
     echo $id_utilisateur;
     $sql="DELETE  FROM réservation WHERE id_Trajet='$id_trajet' and id_Utilisateur='$id_utilisateur'";
     $result = mysqli_query($conn, $sql);
     header("location:vosreservation.php");

?>