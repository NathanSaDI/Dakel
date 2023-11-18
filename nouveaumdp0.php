<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

if (!isset($_SESSION)) {
  session_start();

}

?>


<?php 

include("DatabaseConnection.php");
$errors1="";
if(isset($_POST["signup"])) { 
    $mdpacutelle=$_POST["mdpactu"];
    $nouveaumdp=$_POST["nouveaumdp"];
    $confirmermdp=$_POST["nouveaumdp1"];
    $resultat = mysqli_query($conn, "SELECT mot_de_passe FROM utilisateur WHERE Email='" . $_SESSION['Email'] . "'");
    $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);


$mdpacutelle1 = hash('sha256', $mdpacutelle);

if ( $mdpacutelle1==$row["mot_de_passe"] ) {
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\\W_]).+$/";
    if (strlen($nouveaumdp)>=8 && preg_match($password_pattern,$nouveaumdp)) {
        if($nouveaumdp==$confirmermdp) {
 
        if ($nouveaumdp!=$mdpacutelle) {
            $nouveaumdp = hash('sha256', $nouveaumdp);
            $resultat = mysqli_query($conn, "UPDATE utilisateur SET
            mot_de_passe = '$nouveaumdp'
            WHERE Email = '" . $_SESSION['Email'] . "'");
             $errors1.= '<div  style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le mot de passe à été changé avec succés    </div>';
             $_SESSION["errors"]=$errors1;
             header("location:Profil.php");

} else {
    $errors1.= '<div  style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le mot de passe saisi n\'est pas valide. Veuillez en choisir un autre.  </div>';
    $_SESSION["errors"]=$errors1;
    header("location:nouveaumdp.php");


}
         } else {

            $errors1.= '<div  style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; ">  Les mots de passe sont pas identique  </div>';
            $_SESSION["errors"]=$errors1;
            header("location:nouveaumdp.php");


         }
    } else {
        $errors1.= '<div  style=" text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px;">  Le mot de passe doit etre suprieur ou égal a 8 et doit comporter au moins un caractere spécial , une majuscule et une miniscule  </div>';
        $_SESSION["errors"]=$errors1; 
        header("location:nouveaumdp.php");

    }

} else {
    $errors1.= '<div style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Veuillez saissir votre mot de passe  </div>';
    $_SESSION["errors"]=$errors1; 
    header("location:nouveaumdp.php");
}


}
?>