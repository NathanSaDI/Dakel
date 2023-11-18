<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

if (!isset($_SESSION)) {
  session_start();
}



?>

<?php

if(isset($_SESSION['logged']) ) {

    header("location:publiertrajet.php");
}
else {
    $_SESSION["publier"]=1;
    header("location:connexion.php");
}



?>