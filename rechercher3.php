<?php 
if (!isset($_SESSION)) {
    session_start();
  
  }

  if (isset($_GET['id_trajet'])) {
    // Récupérer la valeur 'id_trajet' depuis la requête GET
    $id_trajet = $_GET['id_trajet'];
    $_SESSION["trajet00"]=$id_trajet;
  }
include("DatabaseConnection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher</title>
    <link rel="stylesheet" href="rechercher3.css">
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
    <form action="rechercher03.php" method="POST">
        <?php  
        
        $sql = "SELECT * FROM trajet WHERE id_Trajet='$id_trajet'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $id_uti=$row["id_utilisateur"];

        $sql1 = "SELECT * FROM vehicule WHERE  	id_Utilisateur='$id_uti'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        
       
        $heureSansSecondes = substr($row["Heure_depart"], 0, 5);
        $heureSansSecondes1= substr($row["Heure_arrive"], 0, 5);
        

            
        


        
         $date =$row["Date_Depart"];
         $timestamp = strtotime(str_replace('/', '-', $date));
         
         $mois = array(
             1 => 'janvier',
             2 => 'février',
             3 => 'mars',
             4 => 'avril',
             5 => 'mai',
             6 => 'juin',
             7 => 'juillet',
             8 => 'août',
             9 => 'septembre',
             10 => 'octobre',
             11 => 'novembre',
             12 => 'décembre'
         );
         
         $joursSemaine = array(
             'dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'
         );
         
         $jourSemaineIndex = date('w', $timestamp);
         $jourSemaineCourt = $joursSemaine[$jourSemaineIndex].'.';
         
         $jourMois = strftime("%e", $timestamp);
         $moisIndex = date('n', $timestamp);
         $moisComplet = $mois[$moisIndex];
         $annee = strftime("%Y", $timestamp);
         
         $dateFormatee = $jourSemaineCourt . ' ' . $jourMois . ' ' . $moisComplet ;

    
  


        
        ?>
        <div id="infotrajet" class="borderbottom">
            <div id="date">
                <p><?php echo $dateFormatee; ?></p>
            </div>
            <div id="heurelieu">
                <div id="heure">
                    <p id="top"><?php  echo $heureSansSecondes;?></p>
                    <p id="bottom"><?php  echo $heureSansSecondes1;?></p>
                </div>
                <div id="image"><img src="Icons/trajet.png" alt=""></div>
                <div id="lieu">
                    <div id="depart">
                        <p><?php  echo $row["Ville_Depart"];  ?></p><img src="Icons/flèche profile.png" alt="">
                    </div>
                    <div id="arriver">
                        <p><?php  echo $row["Ville_Arrive"];  ?></p><img src="Icons/flèche profile.png" alt="">
                    </div>
                </div>
            </div>
            <div id="condi">
           

              
                
                <div>
                    <?php if($row["Climatisation"]=="on"): ?>
                    <img src="Icons/Climatisation.png" alt="">
                    <p>Climitasation disponible</p>
                    <?php endif; ?>

                </div>

                <div>
                <?php if($row["Cigarette"]=="on"): ?>
                    <img src="Icons/cigarette.png" alt="">
                    <p>Trajet fumeurs</p>
                    <?php endif; ?>

                </div>




                <div>
                
                <?php if($row["Prise_electrique"]=="on"): ?>
                    <img src="Icons/plug.png" alt="">
                    <p>Prises electriques </p>
               
                 <?php endif; ?>
                </div>

            </div>
            <div id="voiture">
                <p class="vert"><?php echo $row1["marque"]; ?> <?php echo " "; echo $row1["modele"];?></p>
                <p class="gris"><?php  echo $row1["color"];?></p>
            </div>
        </div>
        <div id="infopassager" class="borderbottom">
            <div id="titre">
                <h1>Passagers</h1>
            </div>
            <?php  
                   $resultat = mysqli_query($conn, "SELECT id_Utilisateur FROM réservation WHERE id_Trajet='$id_trajet'");
                   $nbr_ligne=mysqli_num_rows($resultat );
                   if($nbr_ligne>0):
                   while($row55= mysqli_fetch_array($resultat)):
             
            ?>
            <?php 
              $id=$row55["id_Utilisateur"];
              $resultat1 = mysqli_query($conn, "SELECT * FROM utilisateur WHERE id_Utilisateur='$id'");
              $row1 = mysqli_fetch_array($resultat1);
              
            ?>
            <div id="p1">
                <div id="pl1">
                    <p><?php echo $row1["prenom"]; ?></p>
                    <div id="note"><img src="Icons/etoile.png" alt="">
                        <p><?php echo $row1["Note"]; ?>/5</p>
                    </div>
                </div>
                <img id="imghomme" src="Icons/photohomme.png" alt="">
            </div>

            <?php endwhile; ?>
            <?php endif; ?>
            <?php 
             if($nbr_ligne==0):
            ?>
            <p id="oulach"> il y'a pas de passager pour le moment </p>
            <?php endif; ?>
            <div></div>

        </div>
        <?php 
        
        $resultat = mysqli_query($conn, "SELECT id_Utilisateur FROM trajet WHERE id_Trajet='$id_trajet'");
        $row3 = mysqli_fetch_array($resultat);
        $id22=$row3["id_Utilisateur"];
        




        $email=$_SESSION["Email"];
        $resultat = mysqli_query($conn, "SELECT id_Utilisateur FROM utilisateur WHERE Email='$email'") ;
        $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
        $id_utilisateur=$row1["id_Utilisateur"];
       

        $_SESSION["utilisateurreserver"]=$id_utilisateur;

        $resultat22 = mysqli_query($conn, "SELECT * FROM utilisateur WHERE id_Utilisateur='$id22'");
        $row2 = mysqli_fetch_array($resultat22);
            
        
        ?>
        <div id="infoconducteur" class="borderbottom">
            <div id="p2">
                <div id="pl2">
                    <p><?php echo $row2["prenom"]; ?></p>
                    <div id="note2"><img src="Icons/etoile.png" alt="">
                        <p><?php echo $row2["Note"]; ?>/5</p>
                    </div>
                </div>
                <img id="imgfemme" src="Icons/photofemme.png" alt="">
            </div>
            <div id="bio">
                <p><?php  echo  $row2["Bio"]; ?> </p>
            </div>

        </div>
        <div id="prixpersonne">
            <div id="dernierdiv">
                <p id="ohlala">Participation par personne</p>
                <p id="prix"><?php echo $row["Prix"]; ?>DA</p>
            </div>
        </div>
        <input type="submit" value="Rejoindre" id="sub" name="signup">
    </form>


</body>

</html>