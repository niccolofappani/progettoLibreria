


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
                
                session_start();
               
                
                

                echo $_SESSION['itemid'];
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
                echo "<div><p>Home / Catalogo /".$_SESSION['row']['Genere']." / ".$_SESSION['row']['Titolo']."</p></div>";
                echo "<div id='flex-container'><div id='immagineSingola'><img id='fotoLibro' src='".$_SESSION['row']['Foto']."'></div>
                <div id='caratteristicheLibro'><h3>".$_SESSION['row']['Titolo']."</h3> <br>
                <p>Autore: ".$_SESSION['row']['Nome']." " .$_SESSION['row']['Cognome']."</p>
                <p>Casa Editrice: ".$_SESSION['row']['CasaEditrice']."</p>
                <p>Anno: ".$_SESSION['row']['Anno']."</p>
                <p>Pagine: ".$_SESSION['row']['NumeroPagine']."</p>
                <p>Lingua: ".$_SESSION['row']['Lingua']."</p>
                <p>ISBN-10: ".$_SESSION['row']['ISBN10']."</p>
                <form action='libroSingolo.php' method='get'><button type='submit' value='1' name='tipoAcquisto' class='tipologia'>Nuovo: € ".$_SESSION['row']['Prezzo']."</button></form>
                <form action='libroSingolo.php' method='get'><button type='submit' value='2' name='tipoAcquisto' class='tipologia'>Usato: € ".$_SESSION['row']['PrezzoUsato']."</button></form>
                <form action='libroSingolo.php' method='get'><button type='submit' value='3' name='tipoAcquisto' class='tipologia'>Prestito: -</button></form></div>";
                if($_SESSION['tipo']=1){
                    echo "<div id='pulsantiAcquisto'>
                    <h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                    <form action='' method='post'><label for='copie'>Quantita: </label><input type='number' name='copie' value='1' max='".$_SESSION['row']['QuantitaVendita']."'>
                    <button type='submit'>Aggiungi al carrello</button></form></div></div>";
                }else if($_SESSION['tipo']=2){
                    echo "<div id='pulsantiAcquisto'>
                    <h2>Totale: € ".$_SESSION['row']['PrezzoUsato']."</h2>
                    <form action='' method='post'><label for='copie'>Quantita : </label><input type='number' name='copie' value='1' max='".$_SESSION['row']['QuantitaUsato']."'>
                    <button type='submit'>Aggiungi al carrello</button></form></div></div>";
                }
                $_SESSION['row']=$row;
            ?>

        </div>
    </body>
</html>    