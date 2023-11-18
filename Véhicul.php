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
    <title>Renseigner véhicule</title>
    <link rel="stylesheet" href="Véhicul.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=tQ6SdZuCh2Su3KuiJONKjYGOOGOVqjG0qrf1M25pyPYYkxxlxY-v1bag6QUVxhhRlTXxPvPj_ScIoE1Z9GvF10JNZz0b-fMG4eoukjsWC-72OVOMzn0IjVYKUWgC-drXS3wkYuy4b78FINjnZTR45p_yG2XDwTIrKPz-eaCPBEACO2eDpzpEzl0khiy9RmOwOGU6FwCtyBedXZgI2D3YWtpwbfRMmP58CnYf_gmMuoWhPozOzEdAR06o-ZuBvxEzEbInZ4bmKXPoLbbDQgY-R2gHTT-XJMfXd61wLjJkpV54e4i3HD7YDPcrZgNmQ7mu5N5XKM1oes9NQrBkCFwdGediJEUdJ7zYeO9ssI1hvKIcs8vEFxKzxSb8T749eE3ylcQI2wj8Jb21IN53CXE-NyuUXeTLA9sYmMI0_OSjeTP1pU2lG0z-MlUuH0ipi8sdPDndo5fYKym6hwGFmk2Z79e2ufCNaQ5SYTVXnin_VXdP6P8cGfRBTFGtG90ofjLJRZq8o5TcCrEkQSHNqosLjhB2mGHVKLeMEb285Y4KZ2I6RC_UKo4lJ2_ZjGnyfa_YS2mWVAv2WLD5EJ93BuxHHzB51FQQp22yevAIXiDBJCjNpKOHH-hR5yCTXhOMRgnKCeqVxHO5hsLa0FBayPda6N3uP2Gb1aYfcqotFoo-s30vrUGjEdNI94oeldra-4l_YYVFEItMFphcFJAxFg4K9BKc3IucdDdw6qCA2L5U_stG7cwY0zmOAMnstQWm2YbQ67dp_z7_Gl7ZZP5dr6Auar4y7g8Fneug0zAN5eJUroQfo6jpMgjLaIrm2zEoK9gmq6pgQvH6PHrjF_h677F38uw9y8FhQCn6xv1V-mV0UnjN4hRCsuau7gl5Ae2PRQ1ZV2_0T7g93-3XFIbpKiM2b6isxrFcjG-uqInOKFCAhSrnJdSh1UR3ZFO1HG8wMCP4hrmwrljUM2ihY6IdsgFi5Tgr0pn2ilEk-NSTNuZR8px_mBjVlBcWO5NMJrGiZDMJCdlhU2ue4fh-tuUTcAkx53E-v3GjBLfOe7UfF-_dZKQFHnnMjd47_um3mJy4jG7IBQ5CTDYyf-T4yNsaFrgz9PFMibiTA50eXAI9nrcgvKoUHOHWNcUlhcQDs7L6ojFwcRMf_n7kGiFb2bfueIMhVK1VDQ0rQptRH-DO8WUDE4yheylMOsuHgCr_0gusUKPDvrCt0i7WE2cayaM8Odv9yzXziEjoTdbqtrY1U5kpgePM7aFx5IadNP_n9ITKr9LGptZnSfd59SGYxRdlOyQ8MAtrF0e-_b8z8XlpWNecpGW_4D6IVEVRqYU-0wnqTxdT8eXwOmZR9ZS64wsvzaAy_zgPpTI2P-FoSSBbkhkMwZ8GylUnjgheufe7bWfwk0h2KkbDoOtYxfGITaGyXOypiJfKyhdTDkq2VwTG9OAKN-EraQqGI3v4e_POy8J7lLe1yg15bBr1UNIC4e70fC5Yz87sosFZQfNEK63mBL0cFvHme-irfcdABEHxYetHyxDyJbcHFFGBwSAG6hfINW-m-5BzRHrLwk1_3yDOxy5wM4fPUMJZVxmRETO5EUSI9XAsSVMfhZBhmFq7TjIezgIsmIo0Lvwa1PsnXIsAwba3vQMZxFT8oMnNV4mYpI_09_nqV9dJ8yyzBiOnm4CIDfeJwFjsP3p4lTIT--XBjAxj7LiDNFW1NSqsGo9cQ_jQ-JE6ZoD0SqQiHp3V2l6AClxNtKcV59pcLEcLR2qvLlC1kPwLBlGASYcbIyo7zJbeqXDV" charset="UTF-8"></script></head>

<?php
 if (isset($_SESSION["errors"])) {
    echo $_SESSION["errors"];
unset($_SESSION["errors"]);
}

?>





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

        function validateInput(input) {
            var pattern = /^\d{4}$/;
            var errorMessage = document.getElementById("error-message");

            if (pattern.test(input.value)) {
                errorMessage.style.display = "none";
            } else {
                errorMessage.style.display = "block";
            }
        }





    </script>    
    <h1>Renseignez les informations de votre véhicule</h1>
    <form  action="vehicul0.php"  method="post">
        <input class="inputnormal" type="number" minlength="10" maxlength="10" placeholder="Immatriculation" name="Immatriculation"  required          >
        <div class="doubleinput">
            <input type="text" placeholder="Marque" autocomplete="off" required name="Marque">
            <input type="text" placeholder="Modèle" autocomplete="off" required name="modele">
        </div>
        <div class="doubleinput">
            <select id="liste" name="color" >
                <option disabled selected value="" id="Civilite"  style="color: #909090;">Couleur</option>
                <option value="Rouge">Rouge</option>
                <option value="Noir">Noir</option>
                <option value="Blanc">Blanc</option>
                <option value="Bleu">Bleu</option>
                <option value="Gris">Gris</option>
            </select>
            <input type="number" min="1970" max="2023" placeholder="Année" autocomplete="off" required name="Annee">
        </div>
        <div id="btnenregister">
            <input type="submit" id="next" value="Enregistrer" name="signup">
        </div>
    </form>
</body>
</html>