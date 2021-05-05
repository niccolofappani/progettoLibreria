<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    echo "flokko";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM libri"; //query del get di tutti i libri
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) { 
      while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " ISBN: " . $row["ISBN"]. " Titolo" . $row["Titolo"]. "Genere". $row["Genere"]. "CodAutore". $row["CodAutore"]. "NumeroPagine". $row["NumeroPagine"]. "CasaEditrice". $row["CasaEditrice"]. "Lingua". $row["Lingua"]."Prezzo".$row["Prezzo"]. "<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();

?>