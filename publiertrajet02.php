<?php 
 if (!isset($_SESSION)) {
    session_start();
    
}
    ?>


<?php 

if(isset($_POST["signup"])) {
    $date1=$_POST["date"];
    $heure=$_POST["heure"];
    $_SESSION["date12"]=$date1;
    $_SESSION["heure"]=$heure;
    $_SESSION["heure0"]=$heure;
    $_SESSION["heurearrive"] = date('H:i', strtotime($_SESSION["heure"]) + $_SESSION["heure1"] * 60 * 60 + $_SESSION["min"] * 60)+ $_SESSION["jours"]* 60 * 60 * 60;

     

    $date =$date1;
    $timestamp = strtotime(str_replace('/', '-', $date));
    
    $mois = array(
        1 => 'janvier',
        2 => 'février',
        3 => 'mars',
        4 => 'avril',
        5 => 'mai',
        6 => 'juin',
        7 => 'juillet',
        8 => 'août',
        9 => 'septembre',
        10 => 'octobre',
        11 => 'novembre',
        12 => 'décembre'
    );
    
    $joursSemaine = array(
        'dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'
    );
    
    $jourSemaineIndex = date('w', $timestamp);
    $jourSemaineCourt = $joursSemaine[$jourSemaineIndex].'.';
    
    $jourMois = strftime("%e", $timestamp);
    $moisIndex = date('n', $timestamp);
    $moisComplet = $mois[$moisIndex];
    $annee = strftime("%Y", $timestamp);
    
    $dateFormatee = $jourSemaineCourt . ' ' . $jourMois . ' ' . $moisComplet . ' ' . $annee;
    
    echo $dateFormatee;

$_SESSION["date_formater"]=$dateFormatee;
    
header("location:publiertrajet3.php");

}



?>