<?php 

if (!isset($_SESSION)) {
    session_start();
  
  }



?>

<?php 

include("DatabaseConnection.php");
$bio=$_POST["bio"];
echo $bio;
$email= $_SESSION['Email'];
echo $email;
$sql = "UPDATE utilisateur SET Bio='$bio' WHERE Email='$email' ";
$result = mysqli_query($conn, $sql);
$_SESSION["bio"]=$bio;
header("location:profil.php");

?>