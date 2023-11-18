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
    <title>Profil</title>
    <link rel="stylesheet" href="Profil.css">
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
    <form action="profil0.php" method="POST" id="Myform">

        <div id="infotrajet">
            <div id="hautgauche">
                <div id="nomage">
                    <?php 
                    $premiereLettre = substr( $_SESSION['nom'], 0, 1);
                    
                    ?>
                    <p id="prenom"><?php echo $_SESSION['prenom']; ?>.<?php  echo $premiereLettre; ?> </p>
                    <?php
                   $annee = substr($_SESSION['date'], 0, 4);
                   $anneeActuelle = date('Y');
                   $anneeActuelle=intval($anneeActuelle);
                   $annee=intval($annee);
                   $age=$anneeActuelle-$annee;
                    
                    ?>
                    <p id="age"><?php echo $age; ?>ans</p>
                </div>

                <div id="ajoutimg"><img id="add1" src="Icons/add.png" alt=""><input name="img" id="inputphoto" class="hidden"
                        type="file" accept="image/*" placeholder="">
                    <p id="txt"> Ajouter une photo de profil</p>
                </div>
                <div id="ajoutbio">
                        <?php 
                        
                        $email= $_SESSION['Email'];
                        
                        $sql = "SELECT * FROM utilisateur WHERE Email='$email'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        if(!$row["Bio"] ):
                        
                        ?>
                   <img src="Icons/add.png" id="add2" alt=""> <input type="text" id="bio"
                        placeholder="" class="displaynone" name="bio"> <p id="txtbio">Ajouter une bio</p>
                    <?php else: ?>
                        <img src="Icons/added.png" id="add2" alt="">  <input type="text" id="bio"
                        placeholder="" class="displaynone" name="bio">   <p id="txtbio"><?php echo $row["Bio"]; ?></p>
                    <?php endif; ?>
                    <input type="submit" class="hidden">
                </div>

            </div>
            <div id="hautdroite">
                <div id="blob1">
                    <img id="latoff" src="Icons/photo de profil.png" alt="">
                </div>
                <div id="liendiv"><a id="lieninfo" href="informperso.php">Modifier les informations personnelles</a>
                </div>
            </div>
        </div>


        <div id="profil2">
            <div><img id="imgadd" class="pointer" src="Icons/add.png" alt=""><input id="inputpermis" class="hidden"
                    type="file" accept="image/*" placeholder="">
                <p id="txt"> Ajouter une piece d'identité / permis de conduire </p>
            </div>
            <div><img src="Icons/added.png" alt=""><input class="sinp focus" type="email"
                    value=<?php echo $_SESSION["Email"]; ?>>
            </div>
            <?php 
             $numero= $_SESSION['telephone'];
             $numero=substr($numero, 1);
            ?>
            <div><img src="Icons/added.png" alt=""><input class="sinp focus" type="text" value="+213 <?php echo $numero; ?>">
            </div>
        </div>
         
        <div id="vehicule">
            <div id="divtitre">
                <h1 id="titreluimeme">Véhicule</h1>
            </div>
            <div id="vdiv">
                <?php
                
                    
                $email= $_SESSION['Email'];
                        
                $sql = "SELECT * FROM utilisateur WHERE Email='$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $id=$row["id_Utilisateur"];       

                $sql1 = "SELECT * FROM vehicule WHERE id_Utilisateur='$id'";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                $Nombre_ligne=mysqli_num_rows($result1);
                if($Nombre_ligne!==1): 
                
                
                ?>

               <a href="Véhicul.php" id="pipo" > <img src="Icons/add.png" alt=""></a>
                <p>Ajouter un véhicule</p>
                <?php else: ?>
                <img src="Icons/added.png" alt="">
                <p> <?php  echo $row1["marque"]; echo " "; echo $row1["modele"]; ?></p>
               <?php endif; ?>
            </div>
        </div>
       
    </form>
    <div id="menubas">
        <a href="nouveaumdp.php">
            <div>
                <p>Mot de passe</p><img src="Icons/flèche profile.png" alt="">
            </div>
        </a>
        <a href="deconncter.php">
            <div class="borderdiv">
                <p>Déconnexion</p><img src="Icons/flèche profile.png" alt="">
            </div>
        </a>
        <a href="supprimercompte.php?id=<?php echo $email; ?>">
            <div class="borderdiv">
                <p class="seul">Désactiver mon compte</p><img src="Icons/flèche profile.png" alt="">
            </div>
        </a>
    </div>
    <script>
        var btnadd = document.getElementById("add1");
        var photofile = document.getElementById("inputphoto");

        function here() {
            // console.log("helo");
            photofile.click();
        }
        btnadd.addEventListener("click", here);
        function bien(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('latoff').src = e.target.result;
            }

            reader.readAsDataURL(file);
        }
        document.getElementById('inputphoto').addEventListener('change', bien);
        var inputfile = document.getElementById("inputphoto");
        var previewImage = document.getElementById("add1");
        var lep = document.getElementById("txt");
        function adeed() {
            if (inputfile.files.length > 0) {
                previewImage.src = 'Icons/added.png';
                lep.textContent = "Modifier la photo de profil";
                lep.style.color = "#01613B";
            }
            else {
                lep.textContent = "Ajouter une photo de profil";
                previewImage.src = 'Icons/add.png';
            }
        }
        inputfile.addEventListener('change', adeed);
        var imageElement = document.getElementById("latoff");
        var ancienbio = document.getElementById("txtbio");
        var inputbio = document.getElementById("bio");
        var val = inputbio.value;
        var img2 = document.getElementById("add2");
        function belair() {
            if (inputbio.classList.contains("displaynone")) {
                console.log('hello');
                ancienbio.classList.add('displaynone');
                inputbio.classList.remove('displaynone');
                inputbio.focus();
                // inputbio.classList.add('displaynone');
                // inputbio.;
            }
            else {
                inputbio.focus();
            }
            // inputbio.classList.toggle('displaynone');
            // ancienbio.classList.add('displaynone');
            // inputbio.focus();
        }
        img2.addEventListener('click', belair);
        var form = document.getElementById("Myform");
        function eker() {
            form.submit();
            img2.src = "Icons/added.png";

        }
        inputbio.addEventListener('blur', eker);


    </script>

</body>

</html>