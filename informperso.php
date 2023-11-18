<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

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
    <link rel="stylesheet" href="informperso.css">
    <title>informations perso</title>
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php"><img id="logo" src="Icons/Dakel-logo 1.png" alt="logo"></a>
        <div id="petitmenu">
        <a href="rechercher.html">  <button id="rechercher"><img src="Icons/Rechrche.png" alt="">Rechercher</button> </a>
            <img id="lolo" src="Icons/Icon profile.png" alt="">
            <button id="menu"><img id="fleche" src="Icons/flèche.png" alt=""></button>
        </div>
    </header>

    <ul id="liste" class="hidden">
    <a href="Vostrajets.php">
            <li class="bordure"><img src="Icons/trajets.png" alt="">Vos trajets <img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>

        <a href="Vosreservation.php">
            <li class="bordure"><img src="Icons/reservation.png" alt="">Vos réservations <img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>
        <a href="Profil.php">
            <li class="bordure"><img src="Icons/profil.png" alt="">Profil<img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>
        <a href="deconncter.php">
            <li><img src="Icons/déconnexion.png" alt="">Déconnexion<img class="droite" src="Icons/flèche profile.png"
                    alt=""></li>
        </a>
    </ul>
    <script>
        var btnprofl = document.getElementById('menu');
        var listeul = document.getElementById('liste');
        function hidde() {
            listeul.classList.toggle('hidden');
        }
        btnprofl.addEventListener('click', hidde);
    </script>
    <div id="croix"><button> <a href="Profil.php"><img src="Icons/Fermer.png" alt=""></a></button></div>
    <div id="titreinfo">
        <h1>Informations personnelles</h1>
    </div>
    <form action="informperso0.php" method="POST">
        <div id="nomprenom">
            <input type="text" name="nom" id="nom" autocomplete="off" placeholder="Nom" value="<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : '' ?>" >
            <input type="text" name="prenom" id="Prenom" autocomplete="off" placeholder="Prenom" value="<?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '' ?>" >
        </div>
        <div id="genre" > <p> <?php  echo isset($_SESSION['civilite']) ? $_SESSION['civilite']: '' ?> </p> </div>
        <input type="date" name="date_naissance" class="autreinput" autocomplete="off
        " placeholder="" value="<?php echo isset($_SESSION['date']) ? $_SESSION['date']: '' ?>" >
        <input type="email" name="email" class="autreinput" autocomplete="off
        " placeholder="Email" value="<?php echo isset($_SESSION["Email"]) ? $_SESSION["Email"] : '' ?>" >
        <input type="text" name="telephone" class="autreinput" autocomplete="off
        " placeholder="Téléphone"  value="<?php echo isset($_SESSION["telephone"]) ? $_SESSION["telephone"] : '' ?>" >
        <input type="text" name="adresse" class="autreinput" autocomplete="off
        " placeholder="Adresse" value="<?php echo isset($_SESSION['adresse']) ? $_SESSION['adresse'] : '' ?>" >
        <input type="submit" name="signup" value="Enregistrer" autocomplete="off
        " id="submit">
    </form>

</body>

</html>