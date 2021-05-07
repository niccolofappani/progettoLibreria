<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }
    
    echo $_GET["id"];
    //$sql = "DELETE FROM libro WHERE libro.ID='$_GET["ID"]'";
?>