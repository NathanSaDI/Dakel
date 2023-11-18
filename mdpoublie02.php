<?php 
if (!isset($_SESSION)) {
    session_start();
  }

  ?>
  <?php

include("DatabaseConnection.php");

if(isset($_POST["signup"])) {

    $email=$_SESSION["emailforget"];
    $newpassword=$_POST["password"];
    $newpassword2=$_POST["password2"];
    $errors='';
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\\W_]).+$/";
    if (strlen($newpassword)>=8 && preg_match($password_pattern,$newpassword)) { 
        if($newpassword==$newpassword2) {

            $resultat = mysqli_query($conn, "SELECT mot_de_passe FROM utilisateur WHERE Email='" . $email . "'");

            $row = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
             


            $newpassword = hash('sha256', $newpassword);
             if($newpassword!=$row["mot_de_passe"]) {
                $resultat = mysqli_query($conn, "UPDATE utilisateur set mot_de_passe='$newpassword' WHERE Email='$email'") ;
                header("location:Acceuilofficiel1.php");
             } else {
                $errors.= '<div  style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; ">  Le mot de passe saisi n\'est pas valide. Veuillez en choisir un autre.  </div>';
                $_SESSION["errors"]=$errors;
                header("location:mdpoublie2.php");
             }



        } else {
            $errors.= '<div  style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; ">  Les mots de passe sont pas identique  </div>';
            $_SESSION["errors"]=$errors;
            header("location:mdpoublie2.php");
        }
    } else {
        $errors.= '<div  style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px;">  Le mot de passe doit être d\'au moins 8 caractères et contenir au moins un caractère spécial, une lettre majuscule et une lettre minuscule. </div>';
        $_SESSION["errors"]=$errors;
        header("location:mdpoublie2.php");

    }




}


?>