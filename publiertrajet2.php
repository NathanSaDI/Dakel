<?php 
 if (!isset($_SESSION)) {
    session_start();
    
}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un trajet</title>
    <link rel="stylesheet" href="publiertrajet2.css">
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

    <div id="publier">
        <h1>Publier une</h1>
        <h1> annonce</h1>
    </div>
    <div id="numetape">
        <div class="cercle">1</div>
        <p class="ligne"></p>
        <div id="cercle4" class="cercle">2</div>
        <p class="ligne"></p>
        <div class="cercle">3</div>
        <p class="ligne"></p>
        <div class="cercle">4</div>
        <p class="ligne"></p>
        <div class="cercle">5</div>
    </div>
    <form action="publiertrajet02.php" method="POST">
        <div>
            <input type="date" class="inputnrml" placeholder="Date de départ" id="date"    min="<?php echo date('Y-m-d'); ?>"            name="date" value="<?php echo isset($_SESSION["date12"]) ? date('Y-m-d', strtotime($_SESSION["date12"])) : ''; ?>" >
            <input type="time" class="inputnrml2" id="temps" name="heure" value="<?php echo isset($_SESSION["heure"]) ? date('H:i', strtotime($_SESSION["heure"])) : ''; ?>">
</div>
        <input type="submit" id="next" value="Suivant" name="signup">
    </form>
    <a href="publiertrajet.php"><button id="before">Précédent</button>

</body>

</html>



<?php
if (isset($_SESSION["date"]) || isset($_SESSION["heure"]) ) {
    unset($_SESSION["date"]);
    unset($_SESSION["heure"]);
}
?>