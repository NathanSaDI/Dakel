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
    <link rel="stylesheet" href="publiertrajet3.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>
<header>
    <a href="Acceuilofficiel1.php"><img id="logo" src="Icons/Dakel-logo 1.png" alt="logo"></a>
    <div id="petitmenu">
    <a href="rechercher.html">  <button id="rechercher"><img src="Icons/Rechrche.png" alt="">Rechercher</button> </a>
        <img id="lolo" src="Icons/Icon profile.png" alt="">
        <button id="menu"><img id="fleche" src="Icons/flèche.png" alt=""></button>
    </div>
</header>
<body  >
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
    <div id="cercle4" class="cercle">3</div>
    <p class="ligne"></p>
    <div class="cercle">4</div>
    <p class="ligne"></p>
    <div class="cercle">5</div>
</div>
<script>
    
  
    </script>
<form action="publiertrajet03.php" method="POST">
 








     <div id="div">
    <label for="route-options">Choisissez votre itinéraire</label>
    <select id="route-options" name="itineraire">
    </select>


  </div>







   
    <div id="googleMap" style="height: 210px; width: 500px;" >
    </div>

   

    <input type="submit" id="next" name="signup"  value="Suivant">
</form>

<a href="publiertrajet2.php"><button id="before">Précédent</button></a>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn9WcfWiphxnllmGuuKyzf49uRoxakvj4&libraries=places"></script>
<script>
  
  var algeriaBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(19.5, -8.7), // sud-ouest
    new google.maps.LatLng(37.1, 11.9)  // nord-est
  );

var myLatLng = {lat: 28.0339, lng: 1.6596};
var mapOptions = {
    center: myLatLng,
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    restriction: {
        latLngBounds: algeriaBounds,
        strictBounds: false
      }

};
//create map
var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);



//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);



//define calcRoute function
function calcRoute() {
    var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
/* supprimer les anciens itinéraire */
var select = document.getElementById("route-options");
  while (select.firstChild ) {
  
      select.removeChild(select.firstChild);
    
  }
   /* créer une option  */
  var option = document.createElement("option");
  option.text="choisissez un itinéraire";
  select.appendChild(option);
  document.getElementById("div").appendChild(select);

     // Créer une requete //
    var request = {
        origin: '<?php echo $_SESSION["lieudep"]; ?>',
        destination: '<?php echo $_SESSION["lieuarv"]; ?>',
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.MATRIC,
        provideRouteAlternatives: true /* autoriser les iténirares alternative */
    }


    /* passer la requete à la méthode route */
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            var directionsRenderers = [];
          


         /* pour afficher les itinéraires alternatives dans l'option */
            var select = document.getElementById("route-options");
            for (var i = 0; i < result.routes.length; i++) {
                var option = document.createElement("option");
                option.value = i;
                option.text = "Itinéraire " + (i+1) + ": " + result.routes[i].legs[0].distance.text + ", " + result.routes[i].legs[0].duration.text+", " + result.routes[i].summary;
                option.value=option.text;
                select.appendChild(option);
                document.getElementById("div").appendChild(select);
            }
        

        
    
         
             
              var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                directions: result,
                routeIndex: 0, // Affichez le premier itinéraire par défaut
                polylineOptions: {
                    strokeColor: '#FF0000' // Utilisez la couleur rouge pour l'itinéraire sélectionné par défaut
                }
            });
            directionsRenderers.push(directionsRenderer);



               /* afficher les itinéraire lors d'un changement dans checkbox */

               select.addEventListener("change", function() {
    // Récupérer l'indice de l'itinéraire sélectionné
    var selectedRouteIndex = parseInt(this.value);

    // Mettez à jour la couleur de la ligne pour l'itinéraire sélectionné
    directionsRenderer.setOptions({
        routeIndex: selectedRouteIndex,
        polylineOptions: {
            strokeColor: '#FF0000'
        }
    });
});
            

         
            
            


        } else {
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            output.innerHTML = "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
        }
    });

}


calcRoute();
    






</script>






















</body>

</html>