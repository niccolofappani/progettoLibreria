<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM libroUsato WHERE IDUsato=".$_POST['itemid'];
    $conn->query($sql);

    $sql = "DELETE FROM libroVendita WHERE IDVendita=".$_POST['itemid'];
    $conn->query($sql);

    $sql = "DELETE FROM libro WHERE IDLibro=".$_POST['itemid'];
    $conn->query($sql);

    
?>