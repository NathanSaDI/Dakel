<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

if (!isset($_SESSION)) {
  session_start();

}

?>

<?php 

include("DatabaseConnection.php");
if(isset($_POST["signup"])) {

echo "hello world";
 $email= $_POST["email"];
 $telephone = $_POST["telephone"];
 $adresse=$_POST["adresse"];
 $date=$_POST["date_naissance"];
 $nom=$_POST["nom"];
 $prenom=$_POST["prenom"];
 $errors="";
 $email_pattern = "/[a-zA-Z0-9\\+\\.\\_\\%\\-\\+]{5,256}\\@[a-zA-Z0-9][a-zA-Z0-9\\-]{4,64}(\\.[a-zA-Z0-9][a-zA-Z0-9\\-]{1,25})+/";  
 if (preg_match($email_pattern, $email)) {
  $resultat = mysqli_query($conn, "SELECT id_utilisateur FROM utilisateur WHERE Email='$email' AND Email!='" . $_SESSION['Email'] . "'");

  $Nombre_ligne=mysqli_num_rows($resultat);
    /* vérifier dans la base de données si l'email entrée  est unique */
    if ( $Nombre_ligne==0) {
   
       
      $resultat = mysqli_query($conn, "SELECT id_utilisateur FROM utilisateur WHERE Telephone='$telephone' AND Telephone!='" . $_SESSION['telephone'] . "' ") ; 
      $Nombre_ligne1=mysqli_num_rows($resultat);

      if ($Nombre_ligne1==0) {

        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $email = mysqli_real_escape_string($conn, $email);
        $telephone = mysqli_real_escape_string($conn, $telephone);
        $adresse = mysqli_real_escape_string($conn, $adresse);
        $date=mysqli_real_escape_string($conn, $date);


        $resultat = mysqli_query($conn, "UPDATE utilisateur SET
    nom = '$nom',
    prenom = '$prenom',
    Email = '$email',
    date_naissance = '$date',
    Telephone = '$telephone',
    adresse = '$adresse'
    WHERE Email = '" . $_SESSION['Email'] . "'");

    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['Email']=$email;
    $_SESSION['date']=$date;
    $_SESSION['telephone']=$telephone;
    $_SESSION['adresse']= $adresse;

    header("location:informperso.php"); 

      } else {
        $errors.= '<div style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le numéro de téléphone est deja utilisé </div>';
        $_SESSION["errors"]=$errors;
        header("location:informperso.php"); 
      }

    }
    else {
      $errors.= '<div style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px;">L\'email est déjà utilisé </div>';
      $_SESSION["errors"]=$errors;
      header("location:informperso.php"); 

    }



 }











}




?>