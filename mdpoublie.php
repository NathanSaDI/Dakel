<?php 
 if (!isset($_SESSION)) {
    session_start();
    if (isset($_SESSION["errors"])) {
    echo $_SESSION["errors"];
   unset($_SESSION["errors"]);
  }
}
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mdpoublie.css">
    <link rel="icon" href="opop.png">
    <title>Mot de passe oublie</title>
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="connexion.php"><button id="connexion">Connexion</button></a>
            <a href="inscription.php"><button id="inscription">Inscription</button></a>

        </div>
    </header>
    <div id="titremdp">
        <h1>Mot de passe oublié</h1>
    </div>
    <div id="texte">
        <h3>
            Saisissez votre adresse e-mail. nous vous
        </h3>
        <h3>
            enverrons un lien pour reintialiser votre mot de
        </h3>
        <h3>
            passe.
        </h3>
    </div>
    <form action="mdpoublie0.php" method="POST">
        <input autocomplete="off" id="mail" type="email" name="forgotemail"  value="<?php echo isset($_SESSION['emailaffichage']) ? $_SESSION['emailaffichage'] : '' ?>"  placeholder="Email">
        <input id="envoyer" type="submit" placeholder="" name="signup" value="Envoyer">
    </form>


</body>

</html>


<?php
if (isset($_SESSION['emailaffichage']) ) {
    unset($_SESSION['emailaffichage']);
}
?>