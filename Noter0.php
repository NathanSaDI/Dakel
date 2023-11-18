<?php 
if (!isset($_SESSION)) {
    session_start();
  
  }
?>
<?php

if (isset($_GET['id'])) {
    // Récupérer la valeur 'id_trajet' depuis la requête GET
    $id = $_GET['id'];
     $_SESSION["id_utilisateur_noter"]=$id;
     
  }
include("DatabaseConnection.php");

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajet</title>
    <link rel="stylesheet" href="Noter.css">
</head>

<body>
    <header>
        <a href="#"><img id="logo" src="Icons/Dakel-logo 1.png" alt="logo"></a>
        <div id="petitmenu">
            <button id="rechercher"><img src="Icons/Rechrche.png" alt="">Rechercher</button>
            <img id="lolo" src="Icons/Icon profile.png" alt="">
            <button id="menu"><img id="fleche" src="Icons/flèche.png" alt=""></button>
        </div>
    </header>

    <ul id="liste" class="hidden">
        <a href="">
            <li class="bordure"><img src="Icons/trajets.png" alt="">Vos trajets <img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>

        <a href="">
            <li class="bordure"><img src="Icons/notification.png" alt="">Notifications <img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>
        <a href="">
            <li class="bordure"><img src="Icons/profil.png" alt="">Profil<img class="droite"
                    src="Icons/flèche profile.png" alt=""></li>
        </a>
        <a href="">
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
    <main id="main" class="blur">
        <div id="infotrajet" class="borderbottom">
            <div id="date">
                <p>Dim. 7 mai</p>
            </div>
            <div id="heurelieu">
                <div id="heure">
                    <p id="top">08:00</p>
                    <p id="bottom">11:00</p>
                </div>
                <div id="image"><img src="Icons/trajet.png" alt=""></div>
                <div id="lieu">
                    <div id="depart">
                        <p>Sidi-aich,Bejaia</p><img src="Icons/flèche profile.png" alt="">
                    </div>
                    <div id="arriver">
                        <p>Belouizdad,Alger</p><img src="Icons/flèche profile.png" alt="">
                    </div>
                </div>
            </div>
            <div id="condi">
                <div><img src="Icons/plug.png" alt="">
                    <p>Prises electriques disponibles</p>
                </div>
                <div><img src="Icons/cigarette.png" alt="">
                    <p>Trajet fumeurs</p>
                </div>
            </div>
            <div id="voiture">
                <p class="vert">Dacia Sandero</p>
                <p class="gris">Blanc</p>
            </div>
        </div>
        <div id="infopassager" class="borderbottom">
            <div id="titre">
                <h1>Passagers</h1>
            </div>

            <div id="p1" class="ouoh">
                <div id="pl1">
                    <p>Kenzi</p>
                    <div id="note"><img src="Icons/etoile.png" alt="">
                        <p>4.5/5</p>
                    </div>
                </div>
                <img id="imghomme" src="Icons/photohomme.png" alt="">
            </div>

            <div></div>

        </div>
        <div id="infoconducteur" class="borderbottom">
            <div id="p2" class="ouoh">
                <div id="pl2">
                    <p>Lydia</p>
                    <div id="note2"><img src="Icons/etoile.png" alt="">
                        <p>4.8/5</p>
                    </div>
                </div>
                <img id="imgfemme" src="Icons/photofemme.png" alt="">
            </div>
            <div id="bio">
                <p>Hello j'aime bien discuter quand je suis a l'aise ! </p>
            </div>

        </div>
        <div id="prixpersonne">
            <div id="dernierdiv">
                <p id="ohlala">Participation par personne</p>
                <p id="prix">400.DA</p>
            </div>
        </div>
    </main>
    <form id="myform" action="note00.php" method="post" class="">
        <img src="Icons/Fermer2.png" id="croix" alt="">
        <div><img id="imghomme2" src="Icons/photohomme.png" alt=""></div>
        <div>
            <?php 
            $sql = "SELECT * FROM utilisateur WHERE id_Utilisateur='$id' ";
            /* éxecuter une requete  sql / mysqli_query  */
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            ?>
            <p>Notez <em> <?php   echo $row["prenom"]; ?></em></p>
        </div>
        <div id="coco">
            <img id="etoile1" data-value="1" class="class
            " src="Icons/star.png" alt=""><img id="etoile2" data-value="2" class="class
            " src="Icons/star.png" alt=""><img id="etoile3" data-value="3" class="class
            " src="Icons/star.png" alt=""><img id="etoile4" data-value="4" class="class
            " src="Icons/star.png" alt=""><img id="etoile5" data-value="5" class="class
            " src="Icons/star.png" alt="">
        </div>
        <input type="hidden" value="0" id="valeur" name="valeuretoile">
    </form>
    <script>
    
        document.addEventListener('DOMContentLoaded', function () {
            var divToggle = document.getElementsByClassName("ouoh");
            var myform = document.getElementById('myform');
            var main = document.getElementById("main");
            for (var index = 0; index < divToggle.length; index++) {
                divToggle[index].addEventListener('click', function () {
                    myform.classList.remove('hidde');
                    main.classList.add('blur');
                });


            }
            var croix = document.getElementById("croix");
            function enlever() {
                myform.submit();
                myform.classList.add("hidde");
                main.classList.remove('blur');

            }
            croix.addEventListener("click", enlever);

        });

        document.addEventListener('DOMContentLoaded', function () {
            var stars = document.querySelectorAll('.class');
            var dap = document.getElementById("valeur");

            stars.forEach(function (star) {
                star.addEventListener('click', function () {
                    dap.value = parseInt(star.dataset.value);
                    updateRating();
                });
            });

            function updateRating() {
                stars.forEach(function (star) {
                    var value = parseInt(star.dataset.value);
                    if (value <= dap.value) {
                        star.classList.add('selected');
                    } else {
                        star.classList.remove('selected');
                    }
                });
            }
        });



    </script>
</body>

</html>