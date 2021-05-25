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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM Libro JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro WHERE TipoLibro.Tipo='Nuovo'"; 
    $result = $conn->query($sql);
    $sql2 = "SELECT * FROM Libro JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro WHERE TipoLibro.Tipo='Usato'"; 
    $result2 = $conn->query($sql2); 
  
    if ($result) {
      echo "<table id='tabellaDB'>";
      echo "<tr><th>ISBN</th><th>Titolo</th><th>Genere</th><th>Codice Autore</th><th>Numero Pagine</th><th>Casa Editrice</th><th>
      Lingua</th><th>Prezzo</th><th>Prezzo Usato</th><th>Copie</th><th>Copie Usato</th></tr>";
      while($row = $result->fetch_assoc() and $row2= $result2->fetch_assoc()) {
        echo "<td>" . $row["ISBN10"]. "</td><td> " . $row["Titolo"]. " </td><td> ". $row["Genere"]. " </td><td> ". $row["CodAutore"]. 
        " </td><td>". $row["NumeroPagine"]. " </td><td> ". $row["CasaEditrice"]. " </td><td> ". $row["Lingua"]. " </td><td> ".$row["Prezzo"]. " </td><td> ".$row2["Prezzo"]." </td>
        <td>". $row["Copie"]. " </td><td>".$row2["Copie"]."</td><td><button class='edit' type='button'>Modifica ✏</button></td>
        <td><button id='".$row["IDLibro"]."' class='delete' 'type='button' >Elimina 🚮</button></td></tr>";
      }
      echo "</table>";
    } 
    else {
      echo "Database vuoto";
    }
    $conn->close();
  ?>
    <script src="script.js"></script>
  </body>
  
</html>

