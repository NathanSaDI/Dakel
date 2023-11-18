
<?php
//Start session // 
/* Une session est une manière de stocker des informations sur un utilisateur entre différentes requêtes HTTP. */

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
    <title>Acceuil</title>
    <link rel="stylesheet" href="Acceuilofficiel1.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body onload="initMap()">
    <header>
        <a href="Acceuilofficiel1.php"><img id="logo" src="Icons/Dakel-logo 1.png" alt="logo"></a>
        <?php if(isset($_SESSION['logged']) ):?>
         <div id="petitmenu">
           <a href="rechercher.html">  <button id="rechercher"><img src="Icons/Rechrche.png" alt="">Rechercher</button> </a>
            <img id="lolo" src="Icons/Icon profile.png" alt="">
            <button id="menu"><img id="fleche" src="Icons/flèche.png" alt=""></button>
        </div> 
        <?php else:?>
            
        <div id="barre1">
        <a href="connexion.php"><button id="connexion">Connexion</button></a>
        <a href="inscription.php"><button id="inscription">Inscription</button></a></div>
        <?php endif;?>
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
    <div id="publiertrajet">
        <div class="par">
            <p> Vous</p>
            <p> avez une</p>
            <p> voiture ?</p>
        </div>
        <div class="parr">
            <p>Faites des économies</p>
            <p> sur vos déplacements,</p>
            <p> publiez une annonce de</p>
            <p> covoiturage !</p>
        </div>
        <a href="DirectionPublier.php"  rel="noreferrer"><button id="btn-pb">Publier un trajet</button></a>
    </div>
    <div class="titre"><h1>Allons y ensemble !</h1></div>
    <div  id="illu1">
        <img src="Icons/image (1).png">
        <form action="rechercher0.php" method="post" >
            <div id="divgen">
                <img src="Icons/Vector.png" alt="" class="petiteicone"><input id="dest" type="text" placeholder="Destination" name="Destinationreserver">
                <img src="Icons/Vector.png" alt="" class="petiteicone"><input id="dep" type="text" placeholder="Départ" name="departreserver">
                <img id="icondate" src="Icons/calendar.png" alt="" class="petiteicone"><input id="date" type="date" placeholder="Aujourd'hui" name="datereserver">
                <input class="rechercher" type="submit" value="Rechercher" name="signup">
            </div>
        </form>
    </div>
    <div id="map" style="height: 0px; width: 400px;"></div>

    <script type="text/javascript">
     btnprofl.addEventListener('click', hidde);
        var idd = document.getElementById("date");
        document.addEventListener('DOMContentLoaded', function () {

            var currentDate = new Date().toISOString().slice(0, 10);
            idd.value = currentDate;
        });
        var inputdep = document.getElementById('dest');
        var inputdest = document.getElementById('dep');
        function removePlace() {
            this.removeAttribute('placeholder');
        }

        inputdep.addEventListener('focus', removePlace);
        inputdest.addEventListener('focus', removePlace);
        inputdep.addEventListener('blur', function () {
            this.setAttribute('placeholder', 'Destination');
        });

        inputdest.addEventListener('blur', function () {
            this.setAttribute('placeholder', 'Départ');
        });
        var iconcalendar = document.getElementById("icondate");
        iconcalendar.addEventListener('click', function () {
            // idd.style.display = "block";
            idd.focus();
        });
    </script>
    <div id="illu2">
        <img src="Icons/OJJ (1).jpg">
    </div>
    <div id="Texteszyada">
        <div class="Carré">
            <img src="Icons/humain.png" class="iconPB" alt="">
            <h3>Renforcement des communautés</h3>
            <p>Le covoiturage peut renforcer les liens communautaires en encourageant les gens à partager des
                trajets avec des personnes qu&#39;ils ne connaissent pas forcément. Cela peut également aider à réduire
                l&#39;isolement social en permettant aux personnes de se déplacer plus facilement et de rencontrer de nouvellespersonnes.</p>  
        </div>
        <div class="Carré">
            <img src="Icons/ecolo.png" class="iconPB" alt="">
            <h3>Solution écologique</h3>
            <p>Le covoiturage permet de réduire le nombre de voitures sur la route, ce qui réduit les émissions de
                gaz à effet de serre et contribue ainsi à la lutte contre le changement climatique.le covoiturage peut
                également réduire la consommation de carburant et, par conséquent, peut aider à réduire la dépendance aux combustibles fossiles.</p>  
        </div>
        <div class="Carré">
            <img src="Icons/economique.png" class="iconPB" alt="">
            <h3>Solution économique</h3>
            <p>Les conducteurs peuvent partager les coûts de carburant et de péage avec leurs passagers, ce qui peut réduire considérablement leurs dépenses de transport. Les passagers peuvent également éviter les coûts de stationnement et les frais associés à la possession d&#39;une voiture.</p>  
        </div>
    </div>
    <section id="algérie">
        <h1>Découvrir l&#39;Algérie</h1>
        <p>L’Algérie, un pays riche en histoire, culture et diversité naturelle. Notre programme vous permettra de découvrir les merveilles de l&#39;Algérie à travers une variété d&#39;expériences humaines uniques.<br> <a class="souligner" href="#m__" rel=""> En savoir plus</a></p>
    </section>
    <section id="basdepage">
        <div class="section">
            <h3>En savoir plus</h3>
            <a href="nous.html"><p>Qui sommes nous ?</p></a>
            <a href=""><p>Nous contacter</p></a>
            <a href=""><p>Comment ça marche ?</p></a>
            <a href="faq.html"><p>FAQ</p></a>
        </div>
        <div class="section">
            <h3>Plus de services</h3>
            <a href="soutenir.html"><p>Nous soutenir</p></a>
            <a href="algerie.html"><p>Programme découvrir l'Algérie</p></a>
        </div>
        <div class="section">
            <h3>Réseaux sociaux</h3>
            <div id="logoréseaux">
                <a href=""><img src="Icons/facebook.png"></a>
                <a href=""><img src="Icons/insta.png"></a>
                <a href=""><img src="Icons/twitter.png"></a>
        </div>
    </section>
    <footer>
        <a href=""><p>Mentions légales</p></a>
        <a href=""><p id="p2">Politique de confidentialité</p></a>
        <div id="droits">
            <img src="Icons/Dakel-logo 1.png">
            <p>,2023 &copy</p>
        </div>
    </footer>
    





</body>
</html>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn9WcfWiphxnllmGuuKyzf49uRoxakvj4&libraries=places"></script>

<script>

 
function initMap() {
      var algeriaBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(19.5, -8.7), // sud-ouest
    new google.maps.LatLng(37.1, 11.9)  // nord-est
  );
  var inputdep = document.getElementById('dest');
  var inputdest = document.getElementById('dep');
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 28.0339, lng: 1.6596}, // centre initial de la carte
    zoom: 5,
    restriction: {
      latLngBounds: algeriaBounds,
      strictBounds: false
    }
  });


var searchOptions = {
  componentRestrictions: { country: 'dz' }
};

var searchBox1 = new google.maps.places.Autocomplete(inputdep, searchOptions);
var searchBox2 = new google.maps.places.Autocomplete(inputdest, searchOptions);

    }


    </script>