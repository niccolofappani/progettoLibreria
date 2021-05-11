<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./style-getQuery.css"  type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
  </head>
  <body>
    <div id="bluebox">
      <p id=title>Database Libri <a href="admin.php"><button class='admin' type='button'>Pagina dell'Admin</button></a></p>
      
    </div>

<?php
    // connessione al DBMS  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }

    $sql="insert into Libro(ISBN, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, Prezzo, CodAutore)
    values(".$_SESSION['ISBN'].",".$_SESSION['Titolo'].",".$_SESSION['Genere'].",".$_SESSION['CasaEditrice'].",".$_SESSION['NumeroPagine'].",".$_SESSION['Lingua'].",".$_SESSION['Prezzo'].",".$_SESSION['CodAutore'].");";
    $conn->query($sql);

    $result = mysqli_query($connessione, $query) or
    
    die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_error($connessione));
    
    mysqli_close($connessione) or die("Chiusura connessione fallita " . mysqli_error($connessione));
?>