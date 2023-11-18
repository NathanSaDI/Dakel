<?php
include("DatabaseConnection.php");

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
    <title>Rechercher</title>
    <link rel="stylesheet" href="rechercher2.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=zmKc-mlyLIisERLDoXf9tShLknaFZccvAeEubnTWA-iFjuKF0022H9NxEBbEw-iq2AdnT5ou-6eCfCryJ8ku_98sBKcXUo5zYgtEZqblxmyl1JhR_xCdCqWFuxo5QILk55n1R7-DzLX6WNzr3iR-Xf-5FpYH8Obl544NBovP713fTHur0BhXD5wRSlQJwo6n2hhCjGmCU41jBdhbmS8QnKL_X8BqrIVMxdGZ-EfLVXLaCPRFHVSJo_LO8G98ZEb879wdDEHePLdxcDVQG3QS8wxBb5iLSx1ZvHAu7b6dSEewpl-Iix7dpmWpoFShscj9b0kxKOf1DkXTU0uke2FpU6CjQKW_G4F_xwcrkT6lzI2vmJx3x_mLKIDB03024INt3xCRC_T0-QxkyI87I1LghdKrRSeJQr019O4DNFWBADAOS11wTrr6viapWpklHn-FvmecI-3bHkuKdRQn9sVZnwwfiFFQSpfWtUZZZD9dJyrk_OTuZ2wEmWfj53JHealziKloYQ6NaxQybLKg2XpukltdchSea_b-_mLBnaBHNHrcoNCR2z115vh4xXf0hTj_QbIvyjeAnBwlRlYe0cSnhdMu6PEERH-CHV8aaxWnjwL0f1aPc1a2lZ348oAdDv5zeeeJdSwO0_g18DU623DW7d9DeC39KT8IUt6MosqHbJoIv0ZVOsc0d94IxfomaJiPbj_qLzSGZZTwQ7ot0W0CO9WYpy_-CrB7HMSgMuIDqF34MgE7xCxJuiCFAMFblVhJr0q5XoxULvAqPfZu6BhX5bZrPL2vCfYkFdscld14YCpCfzKTxQdYWWfFrF1QqYsWhqPM9BpEiMeVNh6wv5M_7JTIDSXhY8zHK9GsR0lmuV3FxVwlTuSfGSNR2sPbx2d9wGgAhXk9wqfqLXcCs4s29OilwznFR0RFg1gk57oJW1QiHBhXtMkyhYYlUZfNkQZZwwG8bZHeTgc42FT5XgyjpZ2no1SdlfXeI3mAFgS8HYwEnAqv9-QlGHQXuhLEKjqymixxYVhesSSHRTegLYqlURxz5cmH_JkSwJjRI6N4WuyWXObFVLIpCbVozet0mgPhqhzhhWs7SjIupHVWmBUt3rBwtRkBiFwjoPx7KwsosmpU6RJ8xjuC04Ootd-vvtnYv_1z8GALtLKgHTBz3cRXs6Os1CXopML1GDWvS5EHcivwEB-t1VPtgI65uhyr-_Urb10_rENFUUVtKCWhRVT9zt_EDCbrC299FREq9Uz-ldeu4TGR6X-lPN9D9u8doTvt0kLQW9aXJ_VeFCefdzk5gOFne_mAGce7kcNpg4NFIQxQLRuoAnOp0KzYPIxrAiTIiYR6TEaJ8d863pcy6RKnjNZc7ZR5gVzv9upwC7YX1zm5yi3ZMNYF0_h2cL4LGamL2jJ1fHMoQmhoVaaYisZHkQkg7okcZDfpkguELaznKud6OdMx2Lg707cRq8hOR3SGDY4ZAgDLm83JuEd5wf8bMfRxh0wffU1YHe-EdFbIY5ImpMnCImZ8LpdSopue9IfI2k9RRryhaN2yEhIYULGNWC22YFPLGYsXP-6XVJTrTAlvuREfJVcnYJTHbnff0cw_2T-4r04DB4B6OikdTBTYkW-WK766LUullDmaIathHftRw1RU6olAdu3cI1paPzGpJcgSIawLCJ-xoeUkd4MMXPo3VqbQ4j7pJhzwmwqPNWS1N-GPRXG91d4VrsiCATPHPexXUQqc17kHHmlqpzM6ecHXh0CcflauahMLK9QGOPNNamh6-ZMLB06zZVWasteQ" charset="UTF-8"></script></head>

<body>
    <header>
        <a href="Acceuilofficiel1.php"><img id="logo" src="Icons/Dakel-logo 1.png" alt="logo"></a>
        <div id="petitmenu">
        <button id="rechercher"><img src="Icons/Rechrche.png" alt="">Rechercher</button>    
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
    <form>
        <div id="divgen">
            <img src="Icons/Vector.png" alt=""><input id="dest" type="text" placeholder="Destination">
            <img src="Icons/Vector.png" alt=""><input id="dep" type="text" placeholder="Départ">
            <img id="icondate" src="Icons/calendar.png" alt=""><input id="date" type="date" placeholder="Aujourd'hui">
            <input class="rechercher" type="submit" value="Rechercher">
        </div>
    </form>
    <main>
        <div id="Filtres">
            <div class="filtre">
                <h2>Heure de départ</h2>
                <div class="element">
                    <label for="checkbox1" class="textelement elmnt1"><p>06:00 - 12:00</p>
                    <input type="checkbox" class="Check" id="checkbox1" name="">
                </div>
                <div class="element">
                    <label for="checkbox2" class="textelement elmnt1"><p>12:01 - 18:00</p>
                    <input type="checkbox" class="Check" id="checkbox2" name="">
                </div>
                <div class="element">
                    <label for="checkbox3" class="textelement elmnt1"><p>Après 18:00</p>
                    <input type="checkbox" class="Check" id="checkbox3" name="">
                </div>   
            </div>
            <div id="barre"></div>
            <div class="filtre">
                <h2 class="titrefiltre">Services et équipement</h2>
                <div class="element">
                    <img src="Icons/cigarette.png">
                    <label for="checkbox4" class="textelement"><p>Cigarette autorisé</p>
                    <input type="checkbox" class="Check" id="checkbox4" name="">
                </div>
                <div class="element">
                    <img src="Icons/plug.png">
                    <label for="checkbox5" class="textelement"><p>Prises éléctriques</p>
                    <input type="checkbox" class="Check" id="checkbox5" name="">
                </div>
                <div class="element">
                    <img src="Icons/climatisation.png">
                    <label for="checkbox6" class="textelement"><p>Climatisation</p>
                    <input type="checkbox" class="Check" id="checkbox6" name="">
                </div>
            </div>
        </div>
         <?php 
         
         $email=$_SESSION["Email"];
         $sql77 = "SELECT * FROM utilisateur WHERE Email='$email' ";
         /* éxecuter une requete  sql / mysqli_query  */
         $result77 = mysqli_query($conn, $sql77);

         $row77 = mysqli_fetch_array($result77, MYSQLI_ASSOC);

      $id=$row77["id_Utilisateur"];

         $sql = "SELECT * FROM trajet WHERE Ville_Depart LIKE '%" . $_SESSION["departreserver"] . "%' AND Ville_Arrive LIKE '%" . $_SESSION["Destinationreserver"] . "%' AND Date_Depart='" . $_SESSION["datereserver"] . "' AND nbr_place_dispo>0 AND id_utilisateur not in ('$id')   ";
         $resultat = mysqli_query($conn, $sql) ;
         $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
         $nbr_ligne=mysqli_num_rows($resultat);
         if($nbr_ligne>0) {
         $resultat1 = mysqli_query($conn, "SELECT id_Utilisateur FROM utilisateur WHERE Email='$email'") ;
         $row2 = mysqli_fetch_array($resultat1, MYSQLI_ASSOC);
         $id_utilisateur=$row2["id_Utilisateur"];
         



         $depart=$row1["Ville_Depart"];
         $depart1 = explode(" ", $depart);
         $depart1[0] = str_replace(",", "", $depart1[0]);

         $Arrive=$row1["Ville_Arrive"];
         $Arrive1 = explode(" ", $Arrive);
         $Arrive1[0] = str_replace(",", "", $Arrive1[0]);


        
         $date =$row1["Date_Depart"];
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
        }
         ?>
         <?php  if($nbr_ligne>0): ?>
        <div id="Trajets">
            <div id="textes">
                <h3> <?php echo $dateFormatee; ?></h3>
                <div id="lieux">
                    <p><?php echo $depart1[0]; ?></p>
                    <img src="Icons/go.png">
                    <p><?php echo $Arrive1[0]; ?></p>
                </div>
                <p><em> <?php echo $nbr_ligne  ?> </em> trajets disponibles</p>    
            </div>
            <?php endif; ?> 
            <?php
          $email=$_SESSION["Email"];
          $resultat = mysqli_query($conn, "SELECT id_Utilisateur FROM utilisateur WHERE Email='$email'") ;
          $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
          $id_utilisateur=$row1["id_Utilisateur"];
          
          $sql = "SELECT * FROM trajet WHERE Ville_Depart LIKE '%" . $_SESSION["departreserver"] . "%' AND Ville_Arrive LIKE '%" . $_SESSION["Destinationreserver"] . "%' AND Date_Depart='" . $_SESSION["datereserver"] . "' AND nbr_place_dispo>0 ";
          $result = mysqli_query($conn, $sql);
          $nbr_ligne=mysqli_num_rows($result);
          
        
            ?> 








            <?php
             
           if($nbr_ligne>0):
            while($row = mysqli_fetch_array($result)):
                
                $heureSansSecondes = substr($row["Heure_depart"], 0, 5);
                $heureSansSecondes1= substr($row["Heure_arrive"], 0, 5);
                $depart=$row["Ville_Depart"];
                $depart1 = explode(" ", $depart);
                $depart1[0] = str_replace(",", "", $depart1[0]);
                $Arrive=$row["Ville_Arrive"];
                $Arrive1 = explode(" ", $Arrive);
                $Arrive1[0] = str_replace(",", "", $Arrive1[0]);

                 $id_conducteur=$row["id_utilisateur"];
                
                 $resultat = mysqli_query($conn, "SELECT * FROM utilisateur WHERE id_Utilisateur='$id_conducteur'");
                 $row4 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
                 
             
                ?>
            <a href="rechercher3.php?id_trajet=<?php echo $row['id_Trajet']; ?>" id="monLien" ><div class="info-trajet" >
                <div id="infhaut">
                    <?php $_SESSION["idtrajet1"]=$row["id_Trajet"]; ?>
                    <div id="rcpgauche">
                        <div class="heures">
                           <P class="heure" id="heuredep" ><?php  echo $heureSansSecondes;?></P>
                           <p class="heure" id="downh"><?php  echo $heureSansSecondes1;?></p>
                        </div>
                        <img id="linetrajet" src="Icons/line.png">
                        <div class="heures">
                           <P class="heure"><?php echo $depart1[0]; ?></P>
                           <P class="heure" id="down"><?php echo $Arrive1[0]; ?></P>
                        </div>    
                    </div>
                    <P id="text-prix"> <?php echo $row["Prix"] ?> DA</P>
                </div>
                <div id="infbas">
                    <div id="conducteur">
                        <img src="Icons/photohomme.png">
                        <div id="infconducteur">
                            <p><?php  echo $row4["prenom"]; ?></p>
                            <div id="note">
                                <img src="Icons/etoile.png">
                                <p><?php echo $row4["Note"]; ?>/5</p>
                            </div>
                        </div>
                    </div>
                    <div id="icons">
                        <?php if($row["Cigarette"]=="on"): ?>
                        <img src="Icons/cigarette.png" alt="">
                        <?php endif; ?>
                       
                       
                        <?php if($row["Climatisation"]=="on"): ?>
                        <img src="Icons/Climatisation.png" alt="">
                        <?php endif; ?>
                      
                        <?php if($row["Prise_electrique"]==="on"): ?>
                         <img src="Icons/plug.png" alt="">
                         <?php endif; ?>

                    </div>
                </div>
            </div></a>   
        
            <?php endwhile; ?>
            <?php endif; ?>     
        </div>
    </main>
</body>
</html>
