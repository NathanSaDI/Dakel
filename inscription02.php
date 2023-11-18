<?php 
 if (!isset($_SESSION)) {
    session_start();
}
    ?>


<?php

    if(isset($_POST["signup"])) {
    $_SESSION["nom"] = $_POST["nom"];
    $_SESSION["prenom"] = $_POST["prenom"];
    $_SESSION["civilite"] = $_POST["civilite"];
    $_SESSION["date"] = $_POST["date"];
    
    // Redirigez l'utilisateur vers la page d'inscription suivante
    header("Location: inscription3.php");
    }

?>
