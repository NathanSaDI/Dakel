<?php 
if (!isset($_SESSION)) {
    session_start();
  
  }
  include("DatabaseConnection.php");
 $nombre_passager=$_SESSION["nombre_passager"];
 $participation=$_SESSION["participation"];
 $cigarette= $_SESSION["cigarette"];
 $prise_electrique=$_SESSION["priseelectrique"];
 $climatisation=$_SESSION["Climatisation"];
 $date1=$_SESSION["date12"];
 $heuredepart=$_SESSION["heure"];
 $heureArrivee=$_SESSION["heurearrive"];
 $lieu_Depart=$_SESSION["lieudepp"];
 $lieu_Arrive=$_SESSION["lieuarrive"];
 $itineraire=$_SESSION["itineraire"];
 
 $sql = "SELECT * FROM utilisateur WHERE Email='" . $_SESSION['Email'] . "'";

 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id=$row['id_Utilisateur'];
echo $id;

if( $cigarette) {
    $cigarette="on";
}
else {
    $cigarette="off";
}
if( $prise_electrique) {
    $prise_electrique="on";
}
else {
    $prise_electrique="off";
}

if( $climatisation) {
    $climatisation="on";
}
else {
    $climatisation="off";
}





 $id=mysqli_real_escape_string($conn, $id);
 $nombre_passager=mysqli_real_escape_string($conn, $nombre_passager);
 $participation=mysqli_real_escape_string($conn, $participation);
 $cigarette=mysqli_real_escape_string($conn, $cigarette);
 $prise_electrique=mysqli_real_escape_string($conn, $prise_electrique);
 $climatisation=mysqli_real_escape_string($conn, $climatisation);
 $date1=mysqli_real_escape_string($conn, $date1);
 $heuredepart=mysqli_real_escape_string($conn, $heuredepart);
 $heureArrivee=mysqli_real_escape_string($conn, $heureArrivee);
 $lieu_Depart=mysqli_real_escape_string($conn, $lieu_Depart);
 $lieu_Arrive=mysqli_real_escape_string($conn, $lieu_Arrive);
 $itineraire=mysqli_real_escape_string($conn, $itineraire);

  $resultat = mysqli_query($conn, "INSERT INTO trajet(nbr_place, nbr_place_dispo ,id_Utilisateur ,Date_Depart, Heure_depart , Heure_arrive , Ville_Depart , Ville_Arrive   ,Prix , itineraire, Cigarette,Prise_electrique, Climatisation  ) 
                VALUES ('$nombre_passager', '$nombre_passager' ,'$id'  ,'$date1', '$heuredepart', '$heureArrivee', '$lieu_Depart', '$lieu_Arrive' , '$participation'  , '$itineraire', '$cigarette',' $prise_electrique','$climatisation' )");
                
                header("location:Acceuilofficiel1.php");






?>