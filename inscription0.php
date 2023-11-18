<?php
session_start();

include("DatabaseConnection.php");
    if(isset($_POST["signup"])) {
        
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["conf_password"] = $_POST["conf_password"];
    // Redirigez l'utilisateur vers la page d'inscription suivante
     
    $password=$_SESSION["password"];
    $email=$_SESSION["email"];
    $confirmation=$_SESSION["conf_password"];
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\\W_]).+$/";
    $errors="";
    
    if(  empty($email) || empty($password) || empty($confirmation)   ) {
      $errors= 'l\'un des champs est vide';
    
  }
  
    else {

    if (strlen($password)>=8 && preg_match($password_pattern,$password)) { 
      if($password==$confirmation) {
        
        $email_pattern = "/[a-zA-Z0-9\\+\\.\\_\\%\\-\\+]{5,256}\\@[a-zA-Z0-9][a-zA-Z0-9\\-]{4,64}(\\.[a-zA-Z0-9][a-zA-Z0-9\\-]{1,25})+/";  
        if (preg_match($email_pattern, $email)) {
          $resultat = mysqli_query($conn, "SELECT id_utilisateur FROM utilisateur WHERE Email='$email'") ;
          $Nombre_ligne=mysqli_num_rows($resultat);
            /* vérifier dans la base de données si l'email entrée  est unique */
            if ( $Nombre_ligne==0) {
             
              header("location:inscription2.php"); 

            } else {
              $errors.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px;"> L\'email est déjà utilisé </div>';


              $_SESSION["errors"]=$errors;
              header("location:inscription.php");
            }
        } else {
          $errors.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; ">  l\'email est  invalide </div>';
          $_SESSION["errors"]=$errors;
          header("location:inscription.php");
        }

      } else {
        $errors.= '<div  style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; ">  Les mots de passe sont pas identique  </div>';
        $_SESSION["errors"]=$errors;
        header("location:inscription.php");
      }

    } else {
      $errors.= '<div  style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px;">  Le mot de passe doit être d\'au moins 8 caractères et contenir au moins un caractère spécial, une lettre majuscule et une lettre minuscule. </div>';
        
      $_SESSION["errors"]=$errors;
      header("location:inscription.php");
    }
    
    }
  
    


  }
?>

