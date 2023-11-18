<?php
$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covoiturage";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        /*  utiliser l'encodage UTF-8 */
        mysqli_set_charset($conn, "utf8mb4");
        
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
              
        }
    
        ?>