<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }



    $sql = "DELETE FROM TipoLibro WHERE IDTipoLibro=".$_POST['itemid'] ;
    $conn->query($sql);

    $sql = "DELETE FROM CarrelloLibri WHERE IDLibro=".$_POST['itemid'];
    $conn->query($sql);

    $sql = "DELETE FROM Libro WHERE IDLibro=".$_POST['itemid'];
    $conn->query($sql);

    
?>