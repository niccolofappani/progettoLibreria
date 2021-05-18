<?php
    session_start();
    include('db_connect.php');
    $sql="SELECT count(carrelloLibri.IDcarrellolibri) as conto FROM carrelloLibri WHERE CarrelloLibri.IDutente= '".$_SESSION["codFisc"]."'"; 
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    
?>

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
        <div id="container">
            <a href=index.php><img id="logo" src="img/libro.png" alt="libro"></a>

            <div id="top">
                <label id="title">Libreria di Scandicci</label>
                <form id="searchForm">
                    <input id="searchBar" type="search" placeholder="Cerca..."></input>
                    <button id="searchButton"><img src="img/searchIcon.png"></button>
                </form>
            </div>
                
            <?php
            if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){ 
                echo "<div id='buttons'>
                    <button id='profile'>Ciao ".$_SESSION['user']."</button>
                    <button id='cart'><i class='fa fa-shopping-cart' onclick=document.location='carrello.php'></i></button>".$row['conto']."<br>
                    <button id='logoutButton' onclick=document.location='logout.php'>LOGOUT<img src='img/logoutButton.png'></button>
                </div>";
            }else{
                echo "<div id='buttons'>
                <h3>
                    <input type='button' class='btn btn-warning' id='login' value='Login' onclick=document.location='login.php'></input>
                    <input type='button' class='btn btn-warning' id='signUp' value='Registrati' onclick=document.location='SignUp.php'></input>
                    <input type='button' class='btn btn-warning' id='catalogo' value='Catalogo' onclick=document.location='catalogo.php'></input>
                    <button id='cart'><i class='fa fa-shopping-cart' onclick=document.location='carrello.php'></i></button>
                </h3>
            </div>";
            }
            ?>
            
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "libreria";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) { //fallimento della connessione
                      die("Connection failed: " . $conn->connect_error);
                    }

                    $sql= "SELECT Libro.IDlibro, Libro.Titolo, Libro.Genere, Libro.Foto, Autore.Nome, Autore.Cognome, libroVendita.Prezzo FROM Libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN LibroVendita ON Libro.IDLibro=LibroVendita.IDVendita;";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<div id='ordinamento-libri'>";
                        $i=1;
                            while($row = $result->fetch_assoc()) {
                                
                                echo "<div class='libro'>
                                    <form action='libroSingolo.php' method='get'><button type='submit' name='itemid' value='".$row["IDlibro"]."' class='apriLibro'><img class='foto' src='".$row['Foto']."' alt='immagine'></button></form><br>
                                    <form action='libroSingolo.php' method='get'><button type='submit' name='itemid' value='".$row["IDlibro"]."' class='apriLibro'>".$row['Titolo']."</button></form> <br>
                                    <p>Nuovo: ".$row['Prezzo']." €</p>
                                </div>";
                                if($i%6==0){
                                    echo "<br>";
                                }
                                $i= $i +1;
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

