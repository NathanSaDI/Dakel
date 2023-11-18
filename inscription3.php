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
    <link rel="stylesheet" href="inscription3.css">
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
        <div class="cercle">1</div>
        <p class="ligne"></p>
        <div class="cercle">2</div>
        <p class="ligne"></p>
        <div id="cercle4" class="cercle">3</div>
    </div>
    <form action="inscription03.php" method="POST">
        <div id="inputcontain">
            <input class="inputnormal" type="text" placeholder="Adresse" name="adresse" autocomplete="off"   value="<?php echo isset($_SESSION["adresse"]) ? $_SESSION["adresse"] : '' ?>" >
            <input class="inputnormal" type="text" placeholder="N°téléphone" name="tel" autocomplete="false"  value="<?php echo isset($_SESSION["tel"]) ? $_SESSION["tel"] : '' ?>"  >
        </div>
        <div id="leschecks">
            <div id="firstcond"><input type="checkbox" id="ck1"
                    value="J’accepte la politique de protection des données de la plateforme" required>
                <p id="">J’accepte la politique de protection des données de la plateforme</p>
            </div>
            <div id="second"><input type="checkbox" id="ck2" value="J’accepte de recevoir les actualités du service (informations utiles 
        pour covoiturer, et nouveaux services
            ou nouvelles fonctionnalités)" required>
                <p id="">J’accepte de recevoir les actualités du service (informations utiles pour covoiturer, et
                    nouveaux services
                    ou nouvelles fonctionnalités)</p>
            </div>
        </div>
        <input type="submit" id="inscrire" value="M'inscrire" name="signup">
    </form>
    <a href="inscription2.php"><button id="before">Précédent</button></a>
</body>

</html>

<?php
if (isset($_SESSION["adresse"]) || isset($_SESSION["tel"]) ) {
    unset($_SESSION["adresse"]);
    unset($_SESSION["tel"]);
}
?>
