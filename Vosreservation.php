<?php 

if (!isset($_SESSION)) {
    session_start();
  
  }

include("DatabaseConnection.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos trajets</title>
    <link rel="stylesheet" href="Vostrajets.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=m5ja_txbu8gaLN2Fk1NwnCbu8KulwYJD6AnrsxBbRrUqKcrEo2-pJmTi4gAQin3_f4U8MGwk5Zc8PQ_7_yCwFWjOiGAtlFUN_-eYhiB8mPnYV-SQfjj0PZL8pEskXSlhZIPBV-e5sG99Kg0AoyXuUz-EQsATSRwckd7erE9HIONrOrQpef0nv3VU10DMwGyTpGCu-fi1yX7M7iaEr19uJCxtcMv3j2c7Pa5WisUjLes0_QUODP0dLRWgxcXaOsYKfMQNMn64cHLL9YDHWqgV5zmSDZLefqRbs4krmfZ0SAll5n26NAOBQp2lcYQ5R06R9BBuqq372yDgzneECGcO9nP-gk5fVVih7ZyF2ihBCjDcXBnrfxCCMRPR6mEI9qmn8sdG7nJvwR8tt3ewm8nFca8ZPXWuAJqgOpXGi1e2qz4ypoNt-ScOdUL5CULjrVBJrikYh5aRq_izjsxjMnB_s4aAzQn7_hciMgwDWL25T-jsBov4b_6imkA0OevfdKGHHeuFufTUNO9jz5DcNtyhl8AtN8d_37uS9k6UCNRHvxS5Y7gl0n-g9G4bgIvkKDAaDw1vXRLxGzBmjcj0mXobYGMUtgojxRubXVDpIaJ6joS9zsf8n9z2e-zHcZltwKYMU66_tmJ8Kx2U82kuZVlesJkEg9hbKm8fwihgHC4vOfJGeOMd8TNs_JoWJ1_t9jjGQ6emOzlrFy4eQ6YIAs1B8pGrCc34Nb8TZZpt_HpDGQr0b-eEwxCeeBZyEFaAbAKf6xvNbTCHbrTjB2bdFlF8Nw5AKkyMV55Fzke6PlM6_Lk0tDS8NxfZO5yw-XMIoin_1IGebTDELaFEf_D8EXk5jvWLPx099MDUIyXayChDd6Zf6G4VXgPZOdpvyDsvd63rc-b7NRb4PeX16wu_gz1MZurkrTJrdvoetOe4UXnyN8MEe1S9ny_45tNzuRbhUeOiihUgP5Gaqjcymldhqxeu5fExN9XdB_A0xE__qPECAzkwaRTuAxftU3-zb2DUaAfKUkXWucud4AEUqQ5VCJlqj4jtMpFDqIvQRNO4-bv8A_z1Sgfq_zcF2jigLOsWB4HPlY8eIJVsRBSFBsqjFfRwrHEk2tBRHE0roOiItdIj0V5jwDjCuJHuY1SFx4zFX2Z0KduQJKXpKcrNzxK9Yw4ce4Qv5ToR-PjhkhHsRVoYdq4Kx1N7309Gg_wvMZ7o7dq0d3vw49d78sfSiqKmaVgN3Fuj63Jpvxb_K3LSdSb85unfoFGI1pP36pmJOJmvGK2dKJeAa4so5PyGPQG6NMpsVDLh6SY8m8AY9VO8EeMAezHsdxDu8Nk-n1ojd0emVPACtj7GFRk1-wv3rrkgm2iXrqxOiSi1ORKlVyAjSCXsP1BxoYTWOaGgI7Lv4lc0Hr8T3cLe2Pj6QS38weTOKUiwlvnzMdeZaFIZUs3R4hIGmxjT8cmrGIFfk86VK6N85aT6Jn1NHNM-VtYxcw3B0HeFVmrxkUp0YPU4Ea52A4srEYiVKk9MgJkFeaKkifcxvuVgY5B6eaR6aUymH6GcpIC20p2-FRXkTg2gb__tORB2l6yFig1dkJ5K8WQcxI-4qw9gGJVSTUbTOg2cjP5_60oqKIG8uHy4aFJ1jlyFYIQP9aJ44Ebgsngg7PcpfQ-_JY_hOLUKW0DEVEv6zt79w7SB4nGIC_ewgshlvcqIc6nuZTAxtLkUViUzG2yPXqoJNE05BUjprKCwAwWz5niOT49tY3VLQxlXf0Ccmlu47-essgBMNnKDkE9r9pFhT1J6d6Fo" charset="UTF-8"></script></head>

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
            listeul.classList.toggle('hidden');}
        btnprofl.addEventListener('click', hidde);
    </script>
    <main>
    <h1>Réservations</h1>
    <?php 

     $email=$_SESSION["Email"];
     $resultat = mysqli_query($conn, "SELECT * FROM utilisateur WHERE Email='$email'") ;
     $row1 = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
     $id_utilisateur=$row1["id_Utilisateur"];
     $date=date('Y-m-d');
     $prenom=$row1["prenom"];

     $sql77="SELECT * FROM réservation WHERE id_utilisateur='$id_utilisateur'";
     $result77 = mysqli_query($conn, $sql77);
     
     $nbr_ligne77=mysqli_num_rows($result77);
     if($nbr_ligne77>0):

        $row77= mysqli_fetch_array($result77);
        $idd=$row77["id_Trajet"];

        $sql = "SELECT * FROM trajet WHERE id_Trajet='$idd'";
        $result = mysqli_query($conn, $sql);
        $nbr_ligne=mysqli_num_rows($result);
       
         
   

   
    
    
      if($nbr_ligne>0):
        $result789=mysqli_query($conn, "SELECT id_utilisateur FROM trajet WHERE id_Trajet='$idd'") ;
        $row789=mysqli_fetch_array($result789);
        $idd1=$row789["id_utilisateur"];


        $result790=mysqli_query($conn, "SELECT * FROM utilisateur WHERE id_Utilisateur='$idd1'") ;
        $row790=mysqli_fetch_array($result790);
          $prenom=$row790["prenom"];
        while($row = mysqli_fetch_array($result)):


                $heureSansSecondes = substr($row["Heure_depart"], 0, 5);
                $heureSansSecondes1= substr($row["Heure_arrive"], 0, 5);
                $depart=$row["Ville_Depart"];
                $depart1 = explode(" ", $depart);
                $depart1[0] = str_replace(",", "", $depart1[0]);
                $Arrive=$row["Ville_Arrive"];
                $Arrive1 = explode(" ", $Arrive);
                $Arrive1[0] = str_replace(",", "", $Arrive1[0]);








    ?>
    <a href="noterreserver.php?id_trajet=<?php echo $row['id_Trajet']; ?>"><div class="info-trajet">
                <div id="infhaut">
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
                    <P id="text-prix"><?php echo $row["Prix"] ?> DA</P>
                </div>
                <div id="infbas">
                    <div id="conducteur">
                        <img src="Icons/photohomme.png">
                        <div id="infconducteur">
                            <p><?php echo $prenom; ?></p>
                            <div id="note">
                                <img src="Icons/etoile.png">
                                <p><?php echo $row1["Note"]; ?>/5</p>
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
                      
                            
                        <?php if($row["Prise_electrique"]=="on"): ?>
                         <img src="Icons/plug.png" alt="">
                         <?php endif; ?>
                         
                       
                         
                    </div>
                </div>
            </div></a>
            <?php endwhile; ?>
            <?php endif; ?> 
            <?php endif; ?>
        </main>
        </body>
        </html>