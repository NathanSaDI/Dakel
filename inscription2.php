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
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription2.css">
    <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>

<body>
    <header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="connexion.php"><button id="connexion">Connexion</button></a>
            <a href="#"><button id="inscription">Inscription</button></a>

        </div>
    </header>

    <div id="titreinscription">
        <h1>Inscription</h1>
    </div>
    <div id="numetape">
        <div class="cercle">1</div>
        <p class="ligne"></p>
        <div id="cercle4" class="cercle">2</div>
        <p class="ligne"></p>
        <div class="cercle">3</div>
    </div>
  
    <form action="inscription02.php" method="post">
        <div id="prenom">
            <input class="nometprenom" type="text" placeholder="Nom" id="nom" autocomplete="off" name="nom"  required value="<?php echo isset($_SESSION["nom"]) ? $_SESSION["nom"] : '' ?>">
            <input class="nometprenom" type="text" placeholder="Prénom" id="prenom2" autocomplete="off" name="prenom"  required value="<?php echo isset($_SESSION["prenom"]) ? $_SESSION["prenom"] : '' ?>" >
        </div>
        <select class="inputnormal" name="civilite" id="liste">
            <option disabled selected value="" name="civilite"  id="Civilite" style="color: #909090;">Civilité</option>
        <option value="Homme" <?php echo isset($_SESSION["civilite"]) && $_SESSION["civilite"] === "Homme" ? 'selected' : '' ?>>Homme</option>
        <option value="Femme" <?php echo isset($_SESSION["civilite"]) && $_SESSION["civilite"] === "Femme" ? 'selected' : '' ?>>Femme</option>
        <option value="Personnalisé" <?php echo isset($_SESSION["civilite"]) && $_SESSION["civilite"] === "Personnalisé" ? 'selected' : '' ?>>Personnalisé</option>
        </select>
        <input class="inputnormal" type="date" id="date" name="date" placeholder="JJ/MM/AAAA" required   value="<?php echo isset($_SESSION["date"]) ? date('Y-m-d', strtotime($_SESSION["date"])) : ''; ?>" >

        <input type="submit" id="next" value="Suivant" name="signup">
    </form>
    <a href="inscription.html"><button id="before">Précédent</button></a>
    <script>
        var inputdate = document.getElementById('date');
        function changeColor() {
            this.style.color = "#000000";
        }
        inputdate.addEventListener('click', changeColor);

    </script>
</body>

</html>


<?php
if (isset($_SESSION["nom"]) || isset($_SESSION["prenom"]) || isset($_SESSION["civilite"]) || isset($_SESSION["date"])   ) {
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["civilite"]);
    unset($_SESSION["date"]);
}
?>
