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
    <title>Nouveau mdp</title>
    <link rel="stylesheet" href="nouveaumdp.css">
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
    <div id="titre">
        <h1>Mot de passe</h1>
    </div>
    <form action="nouveaumdp0.php" method="post">
        <input type="password" class="inputnormal" name="mdpactu" placeholder="Mot de passe actuel">
        <input type="password" class="inputnormal" name="nouveaumdp" placeholder="Nouveau mot de passe">
        <input type="password" class="inputnormal" name="nouveaumdp1" placeholder="Confirmez le mot de passe">
        <input type="submit" id="sub" value="Enregistrer" name="signup" >
    </form>
</body>

</html>