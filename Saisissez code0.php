<?php 
 if (!isset($_SESSION)) {
    session_start();

}
    ?>
<?php 
include("DatabaseConnection.php");
if(isset($_POST["signup"])) {
    echo "hey";
    $codeinput=$_POST["code"];
    $errors="";
     /* chercher le code et Temp_Code dans la base de donnes */
    $sql="SELECT prenom,Code,Temp_Code from utilisateur where Email= '". $_SESSION['email_verification'] ."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $temps = date('Y-m-d H:i:s');

    if($codeinput==$row['Code']) {
        $nouveauTempCode = date('Y-m-d H:i:s', strtotime($row['Temp_Code'] . ' +3 minutes'));
    

    if ($temps >$nouveauTempCode ) { 
        $errors.= '<div style=" font-family: Montserrat; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le code est expiré , un autre code a été envoyé à votre Email </div>';
        $_SESSION["errors"]=$errors;


        $code=mt_rand(10000,99999);
                 $temps = date('Y-m-d H:i:s');
                 $sql = "UPDATE utilisateur SET Code='$code', Temp_Code='$temps' WHERE Email = '" . $_SESSION["email_verification"] . "'";
                 $result = mysqli_query($conn, $sql);
                
                 require_once 'mail.php';
                 $mail->setfrom('massinsadi2020gmail.com','massin');
                 $mail->addAddress($_SESSION["email_verification"]);
                 $mail->Subject='Confimer votre Compte Dakel ';
                 $mail->Body="Bienvenue sur DAKEL, voici votre code de confirmation : $code";
                 $mail->send();


                 header("location:Saisissez code.php");


     } else {

        $sql = "UPDATE utilisateur SET Code=NULL ,Temp_Code=NULL WHERE Email = '" . $_SESSION["email_verification"] . "'";
        $result = mysqli_query($conn, $sql);
        $_SESSION['logged']=true;
        // header("location:AccueilNew.php");
        header("location:Acceuilofficiel1.php");
  
      }


} 
else {
    $errors.= '<div style=" font-family: Montserrat; position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le code est incorrect </div>';
    $_SESSION["errors"]=$errors;
    header("location:Saisissez code.php");
  
}
}

?>