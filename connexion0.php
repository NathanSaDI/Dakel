
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="police.css">
</head>

</html>


<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

if (!isset($_SESSION)) {
    session_start();
  
  }

  
include("DatabaseConnection.php");

if(isset($_POST["signup"])) {
    $email=$_POST["Email"];
    $_SESSION['Email']=$email;
    $password=$_POST["mdp"];
    $password = hash('sha256', $password);
    $errors="";
$sql = "SELECT * FROM utilisateur WHERE Email='$email' AND mot_de_passe='$password'";
/* éxecuter une requete  sql / mysqli_query  */
$result = mysqli_query($conn, $sql);
/* mysqli_num_rows($result); pour compter le nombre de resultat fourni par la requete sql   */
$Nombre_ligne=mysqli_num_rows($result);
if($Nombre_ligne!==1) {
    /* si le nombre de ligne est 0 donc l'email n'existe pas */
    $errors.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; font-family: "Montserrat";  "> L\'email ou le mot de passe est incorrect. </div>';
    $_SESSION["errors"]=$errors;
    header("location:connexion.php");
}
if($Nombre_ligne==1) {
    
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['nom']=$row['nom'];
    $_SESSION['prenom']=$row['prenom'];
    $_SESSION['Email']=$row['Email'];
    $_SESSION['civilite']=$row['Civilite'];
    $_SESSION['date']=$row['date_naissance'];
    $_SESSION['telephone']=$row['Telephone'];
    $_SESSION['adresse']=$row['adresse'];

    
    if(!$row["Code"]) {
        
        $_SESSION['logged']=true;
       if ($_SESSION["publier"]==1) {
            header("location:publiertrajet.php");
        } else {

       header("location:Accueilofficiel1.php");

    }
    if ($_SESSION["reserver"]==1) {
        header("location:rechercher0.php");
    } else {

   header("location:Acceuilofficiel1.php");

}



    }
    
    else  {
        $_SESSION['email_verification']= $_SESSION['Email'];

        function crypteEmail($emailcrypte) {
            $parts = explode('@', $emailcrypte);
            $username = $parts[0];
            $domain = $parts[1];
        
            $maskedUsername = substr($username, 0, 4) . str_repeat('*', strlen($username) - 4);
            $maskedEmail = $maskedUsername . '@' . $domain;
        
            return $maskedEmail;
        }
        $emailcrypte = $_SESSION['email_verification'];
        $maskedEmail = crypteEmail($emailcrypte);
    
        $_SESSION["email_crypté"]=$maskedEmail;
        $_SESSION['code_connexion']=true;
        header("location:Saisissez code.php");
    }


}



}



?>


<?php 
/*
if ($_SESSION["publier"]==1) {
    header("location:publiertrajet.html");
} else {

echo "vous etes connectés";

}
*/

?>