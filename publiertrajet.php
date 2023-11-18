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
    <link rel="stylesheet" href="publiertrajet.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body onload="initMap()">

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
        <div id="cercle4" class="cercle">1</div>
        <p class="ligne"></p>
        <div class="cercle">2</div>
        <p class="ligne"></p>
        <div class="cercle">3</div>
        <p class="ligne"></p>
        <div class="cercle">4</div>
        <p class="ligne"></p>
        <div class="cercle">5</div>
    </div>
    <form action="publiertrajet0.php" method="POST" class="form">
        <div id="inp">
            <input type="text" class="inputnrml" placeholder="Lieu départ" id="lieudep" name="lieudep" value="<?php echo isset($_SESSION["lieudepp"]) ? $_SESSION["lieudepp"] : '' ?>">
            <div class="icoon">
                <img src="Icons/interchanger.png" id="icon" alt="">
            </div>
            <input type="text" class="inputnrml" placeholder="Lieu d'arrivé" id="lieuarv" name="lieuarv" value="<?php echo isset($_SESSION["lieuarrive"]) ? $_SESSION["lieuarrive"] : '' ?>">
        </div>
        <input type="submit" value="Suivant" id="next" name="signup">
    </form>
    <div id="map" style="height: 0px; width: 0px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn9WcfWiphxnllmGuuKyzf49uRoxakvj4&libraries=places"></script>
    <script>
        document.getElementById("icon").addEventListener("click", function () {
            var input1Value = document.getElementById("lieudep").value;
            var input2Value = document.getElementById("lieuarv").value;
            document.getElementById("lieudep").value = input2Value;
            document.getElementById("lieuarv").value = input1Value;
        });

         

        var input1= document.getElementById("lieudep");
        var input2 = document.getElementById("lieuarv");

        function initMap() {
      var algeriaBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(19.5, -8.7), // sud-ouest
    new google.maps.LatLng(37.1, 11.9)  // nord-est
  );
  
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

var searchBox1 = new google.maps.places.Autocomplete(input1, searchOptions);
var searchBox2 = new google.maps.places.Autocomplete(input2, searchOptions);

    }









    </script>

</body>

</html>



<?php
if (isset($_SESSION["lieudep"]) || isset($_SESSION["lieuarv"]) ) {
    unset($_SESSION["lieudep"]);
    unset($_SESSION["lieuarv"]);
}
?>
