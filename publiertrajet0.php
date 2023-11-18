<?php 
 if (!isset($_SESSION)) {
    session_start();
    
}
    ?>


<?php 

if(isset($_POST["signup"])) {
    $lieu_Depart=$_POST["lieudep"];
    $lieu_Arrive=$_POST["lieuarv"];
      $_SESSION["lieudepp"]=$lieu_Depart;
      $_SESSION["lieuarrive"]=$lieu_Arrive;
      
    $mots1 = explode(" ", $lieu_Depart);
    $mots1[0] = str_replace(",", "", $mots1[0]);
    $_SESSION["lieudep"]=$mots1[0];
    

    $mots2=explode(" ", $lieu_Arrive);
    $mots2[0] = str_replace(",", "", $mots2[0]);
    $_SESSION["lieuarv"]=$mots2[0];
    echo $_SESSION["lieuarv"]; 
     
header("location:publiertrajet2.php");

}






?>