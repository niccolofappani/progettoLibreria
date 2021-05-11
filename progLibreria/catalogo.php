<html>
    <head>
        <title>Catalogo</title>
        <link rel="stylesheet" href="./styles.css"  type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div id="background"></div>
        <div id="container">
            <a href=index.php><img id="logo" src="img/libro.png" alt="libro"></a>

            <div id="top">
                <label id="title">Libreria di Scandicci</label>
                <form id="searchForm">
                    <input id="searchBar" type="search" placeholder="Cerca..."></input>
                    <button id="searchButton"><img src="img/searchIcon.png"></button>
                </form>
            </div>
                
            <div id="buttons">
                <h3>
                    <input type="button" class="btn btn-warning" id="login" value="Login" onclick="document.location='login.php'"></input> 
                    <input type="button" class="btn btn-warning" id="signUp" value="Registrati" onclick="document.location='SignUp.php'"></input>
                    <button id="cart"><i class="fa fa-shopping-cart"></i></button>
                </h3>
            </div>
            <div id="catalog">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "libreria";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) { //fallimento della connessione
                      die("Connection failed: " . $conn->connect_error);
                    }

                    $sql= "SELECT Libro.Titolo, Libro.Genere, Libro.Prezzo, Libro.Foto, Autore.Nome, Autore.Cognome, libroVendita.Prezzo FROM Libro JOIN Autore ON Libro.CodAutore = Autore.IDAutore JOIN LibroVendita ON Libro.IDLibro=LibroVendita.IDVendita";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<div>";
                        while($row = $result->fetch_assoc()) {
                            echo "<div>
                                <button type='image' src='".$row['foto']."'></button>
                                <button type='text'>".$row['titolo']." </button> 
                                <p>Nuovo: ".$row['prezzo']."</p>
                            </div>";
                        }
                        
                        echo "</div>";
                      } 
                      else {
                        echo "Database vuoto";
                      }
                    
                ?>
            </div>
    </body>
</html>