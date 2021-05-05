<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./style-getQuery.css"  type="text/css">
  </head>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM libro"; //query del get di tutti i libri
    $result = $conn->query($sql); 
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " | ISBN: " . $row["ISBN10"]. " | Titolo: " . $row["Titolo"]. " | Genere letterario: ". $row["Genere"]. " | Codice autore: ". $row["CodAutore"]. " | Numero pagine: ". $row["NumeroPagine"]. " | Casa editrice: ". $row["CasaEditrice"]. " | Lingua: ". $row["Lingua"]. " | Prezzo: ".$row["Prezzo"]. "<br>";
      }
    } else {
      echo "Database vuoto";
    }
    $conn->close();

?>