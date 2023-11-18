<?php 
 if (!isset($_SESSION)) {
    session_start();
 }
 ?>
 <?php
include("DatabaseConnection.php");
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




?>