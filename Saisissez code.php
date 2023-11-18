<?php 
 if (!isset($_SESSION)) {
    session_start();
    if (isset($_SESSION["errors"])) {
        echo $_SESSION["errors"];
   unset($_SESSION["errors"]);
  }

}
    ?>


<?php 
if (isset($_SESSION['code_inscription']) || isset($_SESSION['code_connexion']) ) {
  unset($_SESSION['code_inscription']);
  unset($_SESSION['code_connexion']);

include("DatabaseConnection.php");
$code=mt_rand(10000,99999);
$temps = date('Y-m-d H:i:s');
$sql = "UPDATE utilisateur SET Code='$code', Temp_Code='$temps' WHERE Email = '" . $_SESSION["email_verification"] . "'";
$result = mysqli_query($conn, $sql);
require_once 'mail.php';
$mail->setfrom('massinsadi2020gmail.com','massin');
$mail->addAddress($_SESSION["email_verification"]);
$mail->Subject='Confimer votre Compte Dakel ';
$mail->Body="Bienvenue sur DAKEL, voici votre code de confirmation : $code";
$mail->send();


}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Saisissezcode.css">
</head>
</html>


	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Saisissez code</title>
	<link rel="stylesheet" type="text/css" href="Saisissezcode.css">
  <link rel="icon" href="Icons/opop.png" style=" bottom: 9px; ">
</head>
<body>
	<header>
        <a href="Acceuilofficiel1.php" id="lienacc"><img src="Icons/Dakel-logo 1.png" alt=""></a>
        <div>
            <a href="connexion.php"><button id="connexion">Connexion</button></a>
            <a href="inscription.php"><button id="inscription">Inscription</button></a>

        </div>
    </header>
    <h1 id="Saisissez">Saississez le code que nous vous avons envoyé par e-mail</h1>
    <form action="Saisissez code0.php" method="POST" >
	<p class="text" id="maill">Nous avons envoyé un code à l'adresse : <em id="mail"><?php echo $_SESSION["email_crypté"]; ?></em></p>

		<div id="inputcode"><input id="code6chiffres" name="code" type="password" placeholder="Code à 5 chiffres" name="code" autocomplete="off" required value="" maxlength="5"></div>
    	    <a href="renvoyer.php" class="hidden" id='renvoyer1' ><p id="renvoyer" >Renvoyer le code</p></a>
    	    <p class="text " id="txtcompteur">Code envoyé. Veuillez attendre <em id="compteur">30</em> secondes avant d'en demander un nouveau si besoin
    	</p>
    	<div id="dvenvoyer">
    	    <input type="submit"  value="Envoyer" id="envoyer" name="signup" class="btn">
        </div>
        <script type="text/javascript">
			function updateCounter() {
    var compteurElement = document.getElementById('compteur');
    var compteurValeur = parseInt(compteurElement.textContent);

    if (compteurValeur > 0) {
      compteurElement.textContent = compteurValeur - 1;
    } else {
      // Cacher le texte  une fois que le compteur atteint 0
      var texteCompteur = document.getElementById('txtcompteur');
	  var text = document.getElementById('maill');
      var lienRenvoyer = document.getElementById('renvoyer1');
      texteCompteur.classList.add('hidden');
	  text.classList.add('hidden');
      lienRenvoyer.classList.remove('hidden');

    }
  }

  // Mettre à jour le compteur toutes les secondes (1000 millisecondes)
  setInterval(updateCounter, 1000);

        </script>


    </form>

</body>
</html>