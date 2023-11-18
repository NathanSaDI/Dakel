<?php 

if (!isset($_SESSION)) {
    session_start();
  }


  if (isset($_SESSION['cigarette'])) {
    $etatToggle1 = "checked";

  } else {
    $etatToggle1 = false; // Valeur par défaut si la variable de session n'est pas définie
  }

  if (isset($_SESSION["priseelectrique"])) {
    $etatToggle2 = "checked";

  } else {
    $etatToggle2 = false; // Valeur par défaut si la variable de session n'est pas définie
  }


  if (isset($_SESSION["Climatisation"])) {
    $etatToggle3 = "checked";

  } else {
    $etatToggle3 = false; // Valeur par défaut si la variable de session n'est pas définie
  }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un trajet</title>
    <link rel="stylesheet" href="publiertrajet4.css">
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
        <div id="cercle4" class="cercle">4</div>
        <p class="ligne"></p>
        <div class="cercle">5</div>
    </div>
    <form action="publiertrajet04.php" method="POST">
        <div id="generale">
            <div id="nbrp">
                <p>Nombre de passagers</p><input type="number" placeholder="0" id="inputnbrp" max="4" min="1" required name="numbre"   value="<?php echo isset($_SESSION["nombre_passager"]) ? $_SESSION["nombre_passager"] : '' ?>"      >
            </div>
            <div id="participe">
                <p>Participation par personne</p><input type="number" id="inputparticipe"  name="Participation"  required  value="<?php echo isset($_SESSION["participation"]) ? $_SESSION["participation"] : '' ?>"    >
            </div>
        </div>
        <!-- <p id="prix">Prix recommandé : 300-400 DA</p> -->
        <div class="switches">
                <section id="cigarette">
                    <img src="Icons/cigarette.png" class="icon" alt="">
                    <p>Cigarettes autorisées</p>
                    <div class="m_toggle-container">
                        <input type="checkbox" id="m_toggle1" class="m_toggle-input " name="cigarette"  <?php echo ($etatToggle1 ? 'checked' : ''); ?>         >
                        <label class="m_toggle-slider" for="m_toggle1"></label>
                    </div>
                </section>
                <section id="prise">
                    <img src="Icons/plug.png" class="icon" alt="">
                    <P>Prises éléctriques</P>
                    <div class="m_toggle-container">
                        <input type="checkbox" id="m_toggle2" class="m_toggle-input " name="priseelectrique"  <?php echo ($etatToggle2 ? 'checked' : ''); ?>  >
                        <label class="m_toggle-slider" for="m_toggle2"></label>
                    </div>

                </section>
                <section id="clim">
                    <img src="Icons/Climatisation.png" class="icon" alt="">
                    <p>Climatisation</p>
                    <div class="m_toggle-container">
                        <input type="checkbox" id="m_toggle3" class="m_toggle-input " name="Climatisation"   <?php echo ($etatToggle3 ? 'checked' : ''); ?>  >
                        <label class="m_toggle-slider" for="m_toggle3"></label>
                    </div>
                </section>
        </div>
        <div id="bouttons"><a href="publiertrajet3.html"><button class="btn">Précédent</button>
        <input type="submit"  value="Suivant" id="next" class="btn" name="signup"></div>
    </form>
</body>
<script> 


function calculerMinMax() {

  var input = document.getElementById('inputparticipe');
  console.log(input);
  var kilometre = parseFloat('<?php echo $_SESSION["km"]; ?>');
   var prix=kilometre*1;
   input.min=prix-100;
   input.max=prix+100;

}

calculerMinMax();

</script>
</html>

<?php
if (isset($_SESSION["nombre_passager"]) || isset($_SESSION["participation"]) ||   isset($_SESSION["priseelectrique"])    ||   isset($_SESSION['cigarette']  )   ||    isset($_SESSION["Climatisation"]  )      ) {
    unset($_SESSION["nombre_passager"]);
    unset($_SESSION["participation"]);
    unset($_SESSION['cigarette']);
    unset($_SESSION["priseelectrique"]);
    unset($_SESSION["Climatisation"]);
}
?>