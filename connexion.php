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
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="#"><button id="connexion">Connexion</button></a>
            <a href="inscription.php"><button id="inscription">Inscription</button></a>

        </div>
    </header>

    <div id="titreConnexion">
        <h1>Connexion</h1>
    </div>
    <form action="connexion0.php" method="POST">
        <input type="email" placeholder="Email" class="inputnormal" id="email" autocomplete="off" name="Email" required>
        <input type="password" placeholder="Mot de passe" class="inputnormal" id="password" autocomplete="off" name="mdp" required>
        <a href="mdpoublie.php">
            <p>Mot de passe oublié ?</p>
        </a>
        <input type="submit" id="sub" name="signup"  value="Se connecter">
    </form>
</body>

</html>

<?php
if (isset($_SESSION['Email'])   ) {
    unset($_SESSION['Email']);
  
}
?>
