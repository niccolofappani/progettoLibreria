


<?php
    session_start();
    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"]=false;
    }

    $_SESSION["itemid"]=$_GET["itemid"];
?>

<html>
    <head>
        <title>Catalogo</title>
        <link rel='stylesheet' href='./styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
        
    </head>
    <body>
        <div id='container'>
            <a href=index.php><img id='logo' src='img/libro.png' alt='libro'></a>

            <div id='top'>
                <label id='title'>Libreria di Scandicci</label>
                <form id='searchForm'>
                    <input id='searchBar' type='search' placeholder='Cerca...'></input>
                    <button id='searchButton'><img src='img/searchIcon.png'></button>
                </form>
            </div>

            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'libreria';
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) { //fallimento della connessione
                  die('Connection failed: ' . $conn->connect_error);
                }
                $sql= "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN LibroVendita ON Libro.IDLibro=LibroVendita.IDVendita LEFT JOIN LibroUsato ON Libro.IDlibro=LibroUsato.IDUsato WHERE Libro.IDlibro= ".$_GET['itemid'];
                $result=$conn->query($sql);
                $row = $result->fetch_assoc();
                $_SESSION['row']=$row;
                echo "<div><p><a href='index.php'>Home </a> / <a href='catalogo.php'>Catalogo </a>/".$_SESSION['row']['Genere']." / ".$_SESSION['row']['Titolo']."</p></div>";
                echo "<div id='flex-container'><div id='immagineSingola'><img id='fotoLibro' src='".$_SESSION['row']['Foto']."'></div>
                <div id='caratteristicheLibro'><h3>".$_SESSION['row']['Titolo']."</h3> <br>
                <p>Autore: ".$_SESSION['row']['Nome']." " .$_SESSION['row']['Cognome']."</p>
                <p>Casa Editrice: ".$_SESSION['row']['CasaEditrice']."</p>
                <p>Anno: ".$_SESSION['row']['Anno']."</p>
                <p>Pagine: ".$_SESSION['row']['NumeroPagine']."</p>
                <p>Lingua: ".$_SESSION['row']['Lingua']."</p>
                <p>ISBN-10: ".$_SESSION['row']['ISBN10']."</p>
                <button type='submit' onclick='tipoProdotto(".$_SESSION['row']['Prezzo'].", ".$_SESSION['row']['QuantitaVendita'].", ".$_SESSION['logged'].")'   value='1' name='tipoAcquisto' class='tipologia'>Nuovo: € ".$_SESSION['row']['Prezzo']."</button>
                <button type='submit' onclick='tipoProdotto(".$_SESSION['row']['PrezzoUsato'].", ".$_SESSION['row']['QuantitaUsato'].", ".$_SESSION['logged'].")'   value='2' name='tipoAcquisto' class='tipologia'>Usato: € ".$_SESSION['row']['PrezzoUsato']."</button>
                <button type='submit' onclick='tipoProdotto(0, ".$_SESSION['row']['QuantitaUsato'].", ".$_SESSION['logged'].")'   value='3' name='tipoAcquisto' class='tipologia'>Prestito: -</button></div>
                <div id='pulsantiAcquisto'>";
                
                echo "
                <h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                <form action='aggiungiCarrello.php' method='post'><label for='copie'>Quantita: </label><input id='numerolibri' type='number' name='copie' value='1' min='1' max='".$_SESSION['row']['QuantitaVendita']."'>";
                if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                    echo "<button type='submit' id='buttonCarrello'>Aggiungi al carrello</button></form></div>";
                }else{
                    $alert= "Hai bisogno di effettuare il login";
                    echo "<button id='buttonCarrello type='submit'  title='devi effettuare il login' disabled>Aggiungi al carrello</button></form></div>";
                }
                
                echo "</div>
                <script src='buttons.js'></script>";
            ?>
        </div>
    </body>
</html>    
