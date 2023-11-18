<?php
if (!isset($_SESSION)) {
    session_start();
  
  }

  if(!$_SESSION["emailforget"]) {

    header("location:mdpoublie.php");

} 

if (isset($_SESSION["errors"])) {
    echo $_SESSION["errors"];
unset($_SESSION["errors"]);
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mdp</title>
    <link rel="stylesheet" href="mdpoublie2.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="connexion.php"><button id="connexion">Connexion</button></a>
            <a href="inscripion.php"><button id="inscription">Inscription</button></a>

        </div>
    </header>
    <div id="titre">
        <h1>Mot de passe oublié</h1>
    </div>
    <form action="mdpoublie02.php" method="post">
        <!-- <input type="password" class="inputnormal" placeholder="Mot de passe actuel"> -->
        <input type="password" class="inputnormal" placeholder="Nouveau mot de passe" name="password" required>
        <input type="password" class="inputnormal" placeholder="Confirmez mot de passe" name="password2" required>
        <input type="submit" id="sub" value="Enregistrer" name="signup">
    </form>
</body>

</html>