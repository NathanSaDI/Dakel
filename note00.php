<?php 
if (!isset($_SESSION)) {
    session_start();
  
  }
?>



<?php 

include("DatabaseConnection.php");

$etoile=$_POST["valeuretoile"];
echo $etoile;
$id= $_SESSION["id_utilisateur_noter"];
$sql = "SELECT * FROM utilisateur WHERE id_Utilisateur='$id' ";
            /* éxecuter une requete  sql / mysqli_query  */
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $nbr_Pnote=$row["nbr_Pnote"]+1;
            $valeur=$row["Note"];
            $noteofficiel=(($row["Note"]*$row["nbr_Pnote"])+$etoile)/$nbr_Pnote;
            echo $noteofficiel;
    
            $sql = "UPDATE utilisateur SET Note='$noteofficiel', nbr_Pnote='$nbr_Pnote'  WHERE id_Utilisateur='$id' ";
            $result = mysqli_query($conn, $sql);
  
header("location:Noter.php");

?>