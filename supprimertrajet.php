<?php
if (!isset($_SESSION)) {
    session_start();
  
  }



 if (isset($_GET['id_trajet'])) {
    // Récupérer la valeur 'id_trajet' depuis la requête GET
    $id_trajet = $_GET['id_trajet'];
    $_SESSION["trajet_supprimer"]=$id_trajet;
    $id_trajet=$_SESSION["trajet_supprimer"];
  }

  $id_trajet=$_SESSION["trajet_supprimer"];
  include("DatabaseConnection.php");
  

$sql="DELETE  FROM trajet WHERE id_Trajet='$id_trajet'";
  
$result = mysqli_query($conn, $sql);

header("location:vostrajets.php");

?>