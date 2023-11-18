<?php 
if (!isset($_SESSION)) {
    session_start();
  }

include("DatabaseConnection.php");
$errors="";
if(isset($_POST["signup"])) {
    $email=$_POST["forgotemail"];
    $_SESSION['emailaffichage']=$email;
    $resultat = mysqli_query($conn, "SELECT id_utilisateur FROM utilisateur WHERE Email='$email'") ; 
    $Nombre_ligne=mysqli_num_rows($resultat);
    if ( $Nombre_ligne==1) {
require_once 'mail.php';
$mail->setfrom('massinsadi2020gmail.com','massin');
$mail->addAddress($email);
$mail->Subject='Modification de votre mot de passe ';
$_SESSION['emailforget']=$email;
$mail->Body='Bienvenue sur DAKEL,
 
Pour changer votre mot de passe , veuillez cliquer sur le lien ci-dessous
ou copier/coller dans votre navigateur Internet.
 
 
http://projet-akl/mdpoublie2.php
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';




$mail->send();
$errors.= '<div  style="text-align: left; position: absolute; top: 65px; left: 0px; width: 100%; color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Un lien à été envoyé à votre  email pour changer le mot de passe     </div>';
$_SESSION["errors"]=$errors;
header("location:mdpoublie.php");


} else {
    $errors.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> L\'email n\'existe pas ! </div>';
    $_SESSION["errors"]=$errors;
    header("Location: mdpoublie.php");
}
}
?>