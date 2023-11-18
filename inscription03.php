<?php 
 if (!isset($_SESSION)) {
    session_start();
}
    ?>

<?php
    include("DatabaseConnection.php");
    if(isset($_POST["signup"])) {

    $_SESSION["adresse"] = $_POST["adresse"];
    $_SESSION["tel"] = $_POST["tel"];

    $firstname= $_SESSION["nom"];
    $lastname=$_SESSION["prenom"];
    $email = $_SESSION["email"];
    $password=$_SESSION["password"];
    $confirmation=$_SESSION["conf_password"];
    $phonenumber=$_SESSION["tel"];
    $adresse=$_SESSION["adresse"];
    $civilite=$_SESSION["civilite"];
    $date=$_SESSION["date"];
    $errors1="";
     
    
            $resultat = mysqli_query($conn, "SELECT id_utilisateur FROM utilisateur WHERE Telephone='$phonenumber'") ; 
            $Nombre_ligne1=mysqli_num_rows($resultat);
             
            if ($Nombre_ligne1==0) 
            {   
              
                $datenow = date("Ymd");
                $i = 0;
                $sql = "SELECT id_utilisateur FROM utilisateur";
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $value = $row['id_utilisateur'];
                    $date1 = substr($value, 0, 8);
                    if ($datenow == $date1) {
                        

                        $i = $i + 1;
                    }
                }
                $newnbr=0;
                $newnbr = $i + 1;
            
                $id = $datenow . "_" . sprintf("%04d", $newnbr);

                $cle=mysqli_real_escape_string($conn, $id);
                
                $nom = mysqli_real_escape_string($conn, $firstname);
                $nom=strtoupper($nom);
                $prenom = mysqli_real_escape_string($conn, $lastname);
                $prenom=ucfirst($prenom);
                $email = mysqli_real_escape_string($conn, $email);
                $mot_de_passe = mysqli_real_escape_string($conn, $password);
                $telephone = mysqli_real_escape_string($conn, $phonenumber);
                $adresse = mysqli_real_escape_string($conn, $adresse);
                $adresse=ucfirst($adresse);
                $civilite= mysqli_real_escape_string($conn, $civilite);
                $date=mysqli_real_escape_string($conn, $date);
                /* hacher les mot de passe avec l'algorithme sha256 */
                $mot_de_passe = hash('sha256', $mot_de_passe);
                 
                $resultat = mysqli_query($conn, "INSERT INTO utilisateur(id_Utilisateur,nom, prenom, Email, mot_de_passe, Civilite, date_naissance  ,Telephone, adresse) 
                VALUES ('$cle','$nom', '$prenom', '$email', '$mot_de_passe', '$civilite' , '$date'  , '$telephone', '$adresse')");
                //   $_SESSION['logged']=true;
                  $_SESSION['email_verification']=$email;
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
                   
    function crypteEmail($emailcrypte) {
        $parts = explode('@', $emailcrypte);
        $username = $parts[0];
        $domain = $parts[1];
    
        $maskedUsername = substr($username, 0, 4) . str_repeat('*', strlen($username) - 4);
        $maskedEmail = $maskedUsername . '@' . $domain;
    
        return $maskedEmail;
    }
    $emailcrypte = $email;
    $maskedEmail = crypteEmail($emailcrypte);

    $_SESSION["email_crypté"]=$maskedEmail;
 
echo $maskedEmail;


/* stocker les valeurs dans des variables de session */
    
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['Email']=$email;
    $_SESSION['civilite']=$civilite;
    $_SESSION['date']=$date;
    $_SESSION['telephone']=$telephone;
    $_SESSION['adresse']= $adresse;

        $_SESSION['code_inscription']=true;
       header("location:Saisissez code.php");  
            } else {
                $errors1.= '<div style="position: absolute; top: 65px; left: 0px; width: 100%; color: #a94442; background-color: #f2dede; border-color: #ebccd1;  padding: 15px; margin-bottom: 20px;  border: 1px solid transparent;  border-radius: 4px; "> Le numéro de téléphone est deja utilisé </div>';
                
                $_SESSION["errors"]=$errors1; 
                header("location:inscription3.php");
            }

        } 

?>
