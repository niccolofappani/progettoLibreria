<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./style-getQuery.css"  type="text/css">
  </head>
  <body>
    <div id="bluebox">
      <p id=title>Database Libri  <a href="admin.php"><button class="btn btn-secondary" id="adminButton">Pagina di admin</button></a></p>
    </div>
  </body>
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
    $sql = "SELECT * FROM Libro LEFT JOIN LibroVendita ON Libro.ID=LibroVendita.IDVendita LEFT JOIN LibroUsato ON Libro.ID=LibroUsato.IDUsato"; //query del get di tutti i libri
    $result = $conn->query($sql); 
  
    if ($result->num_rows > 0) {
      echo "<table id='tabellaDB'>";
      echo "<tr><th>ID</th><th>ISBN</th><th>Titolo</th><th>Genere</th><th>Codice Autore</th><th>Numero Pagine</th><th>Casa Editrice</th><th>Lingua</th><th>Prezzo</th><th>Prezzo Usato</th><th>Copie</th><th>Copie Usato</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["ISBN10"]. "</td><td> " . $row["Titolo"]. " </td><td> ". $row["Genere"]. " </td><td> ". $row["CodAutore"]. " </td><td>". $row["NumeroPagine"]. " </td><td> ". $row["CasaEditrice"]. " </td><td> ". $row["Lingua"]. " </td><td> ".$row["Prezzo"]. " </td><td> ".$row["PrezzoUsato"]." </td><td>". $row["QuantitaVendita"]. " </td><td>".$row["QuantitaUsato"]."</td><td><button class='edit' type='button'>Modifica ✏</button></td><td><form method='get' action='delete.php'><button id='".$row["ID"]."' class='delete' 'type='button' >Elimina ⌦</button></form></td></tr>";
      }
      echo "</table>";
    } 
    else {
      echo "Database vuoto";
    }
    $conn->close();

?>