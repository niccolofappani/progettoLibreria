<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h1>Pagina di amministrazione</h1>
            <div>
                <h3>Azioni da amminstratore</h3>
                <p>Visualizza lista libri</p>
                <button onclick="visualizzaLibri()">Aggiorna</button>
                <p>Inserisci libri</p>
                <button>Invio</button>
                <p>Modifica libro</p>
                <button>Modifica</button>
                <p>Elimina libro</p>
                <button>Elimina</button>
            </div>
        </center>
    </body>
</html>

<script>
function visualizzaLibri(){ //TODO: metodo get dell'intero database
    
}


</script>


<?php //TODO: da volare via, mettere in <script>

function visualizzaLibri(){
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
    echo "ID: " . $row["ID"]. " ISBN: " . $row["ISBN"]. " Titolo" . $row["Titolo"]. "Genere". $row["Genere"]. "Autore". $row["Autore"]. "NumeroPagine". $row["NumeroPagine"]. "CasaEditrice". $row["CasaEditrice"]. "Lingua". $row["Lingua"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

};

function aggiungiLibro(){

};
?>
