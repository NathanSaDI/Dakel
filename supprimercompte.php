<?php


include("DatabaseConnection.php");

if (isset($_GET['id'])) {


    $id= $_GET['id'];
    echo $id;
     
$sql="DELETE  FROM utilisateur WHERE Email='$id'";
  
$result = mysqli_query($conn, $sql);
header("location:deconncter.php");

}





?>