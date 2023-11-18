<?php 

if (!isset($_SESSION)) {
    session_start();
  
  }

  if(isset($_POST["signup"])) {

     $itineraire=$_POST["itineraire"];
   
     $_SESSION["itineraire"]=$itineraire;



   $kilometres='';
   $minutes='';
   $heures='';
   $jours='';

   if (preg_match('/(\d+(?:,\d+)?(?:\.\d+)?)\s*(?:km|kilom(?:è|e)tre)/i', $itineraire, $matches)) {
    $kilometres = str_replace(',', '.', $matches[1]);
} else {
    $kilometres = 0; // Valeur par défaut si aucune correspondance n'est trouvée
}
 


if (preg_match('/(\d+)\s*(?:day|jour)s?/i', $itineraire, $matches)) {
    $jours = $matches[1];
} else {
    $jours = 0; // Valeur par défaut si aucune correspondance n'est trouvée
}


if (preg_match('/(\d+(?:\.\d+)?)\s*(?:hours?)/i', $itineraire, $matches)) {
    $heures = $matches[1];
} else {
    $heures = 0; // Valeur par défaut si aucune correspondance n'est trouvée
}

echo $heures;


if (preg_match('/(\d+(?:\.\d+)?)\s*(?:mins?)/i', $itineraire, $matches)) {
    $minutes = $matches[1];
} else {
    $minutes = 0; // Valeur par défaut si aucune correspondance n'est trouvée
}


echo $itineraire;
echo " ";
$kilometres = preg_replace('/\.(\d{3})\b/', '$1', $kilometres);

echo $kilometres;
echo " ";

echo $minutes;
echo " ";

echo $heures;
echo " ";
echo $jours;

$kilometres = preg_replace('/\.(\d{3})\b/', '$1', $kilometres);


$_SESSION["km"]=$kilometres;
$_SESSION["min"]=$minutes;
$_SESSION["heure1"]=$heures;
$_SESSION["jours"]=$jours;




header("location:publiertrajet4.php");



  }

?>