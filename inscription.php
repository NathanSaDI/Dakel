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
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="connexion.php"><button id="connexion">Connexion</button></a>
            <a href="#"><button id="inscription">Inscription</button></a>

        </div>
    </header>
    <div id="titreinscription">
        <h1>Inscription</h1>
    </div>
    <div id="numetape">
        <div id="cercle4" class="cercle">1</div>
        <p class="ligne"></p>
        <div class="cercle">2</div>
        <p class="ligne"></p>
        <div class="cercle">3</div>
    </div>
    <form action="inscription0.php" method="post">
        <input type="email" class="inputnormal" name="email" placeholder="Email" required   value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : '' ?>" >
        <input type="password" class="inputnormal"name="password" placeholder="Mot de passe" required value="<?php echo isset($_SESSION["password"]) ? $_SESSION["password"] : '' ?>" >
        <input type="password" class="inputnormal" name="conf_password" placeholder="Confirmez Votre mot de passe" value="<?php echo isset( $_SESSION["conf_password"]) ?  $_SESSION["conf_password"] : '' ?>" >
        <div id="subbtn"> <input type="submit" id="sub" value="Suivant" name="signup"> </div>
    </form>
</body>


</html>


<?php
if (isset($_SESSION['email']) || isset($_SESSION["password"]) || isset($_SESSION["conf_password"])  ) {
    unset($_SESSION['email']);
    unset($_SESSION["password"]);
    unset($_SESSION["conf_password"]);
}
?>