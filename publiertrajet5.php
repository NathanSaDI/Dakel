

<?php

if (!isset($_SESSION)) {
    session_start();
    $heure=$_SESSION["heure0"];
    $heureArrivee = date('H:i', strtotime($heure) + $_SESSION["heure1"]*60*60 + $_SESSION["min"] * 60);
    $_SESSION["heurearrive"] = $heureArrivee;

    echo $_SESSION["heurearrive"];
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un trajet</title>
    <link rel="stylesheet" href="publiertrajet5.css">
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
        <div class="cercle">2</div>
        <p class="ligne"></p>
        <div class="cercle">3</div>
        <p class="ligne"></p>
        <div class="cercle">4</div>
        <p class="ligne"></p>
        <div class="cercle" id="cercle4">5</div>
    </div>
    <form >
        <p id="date"><?php echo  $_SESSION["date_formater"]; ?></p>
        <p id="place"><?php echo $_SESSION["nombre_passager"]; ?> places</p>


            <div class="info-trajet">
                <div id="rcpgauche">
                    <div class="heures">
                        <P class="heure"><?php echo $_SESSION["heure0"]; ?></P>
                        <p class="heure" id="downh"><?php echo $_SESSION["heurearrive"]; ?></p>
                    </div>
                    <img id="linetrajet" src="Icons/line.png">
                    <div class="heures">
                        <P class="heure"><?php echo  $_SESSION["lieudep"]; ?> </P>
                        <P class="heure" id="down"><?php echo   $_SESSION["lieuarv"]; ?> </P>
                    </div>    
                </div>
                <div id="rcpdroite">
                    <P id="text-prix"><?php echo  $_SESSION["participation"]; ?> DA</P>
                    <p id="text"> Participation par personne  </p>
                    <div id="icons">
                    <?php if(isset($_SESSION["cigarette"]) ):?>
                        <img src="Icons/cigarette.png" alt="">
                        <?php endif;?>
                        <?php if(isset($_SESSION["priseelectrique"]) ):?>
                        <img src="Icons/plug.png" alt="">
                        <?php endif;?>
                        <?php if(isset( $_SESSION["Climatisation"]) ):?>
                        <img src="Icons/Climatisation.png" alt="">
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div id="dvcondition">
                <input type="checkbox" id="checkbox" required>
                <p id="condition">En publiant mon annonce, je certifie avoir un permis de conduire et une assurance valides et à jour</p>
            </div>
            
        </form>
        <a href="publiertrajet05.php"><button id="pb">Publier</button>
    <a href="publiertrajet4.php"><button id="before">Précédent</button>
</body>

</html>