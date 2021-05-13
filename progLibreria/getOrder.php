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
    $sql = "SELECT * FROM Order JOIN Ordine ON Order.IDOrder = Ordine.IDOrder"; //query del get di tutti i libri
    $result = $conn->query($sql); 
  
    if ($result->num_rows > 0) {
      echo "<table id='tabellaDB'>";
      echo "";
      while($row = $result->fetch_assoc()) {
        echo "";
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

