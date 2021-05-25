<<<<<<< HEAD
<?php
    session_start();
    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"]=false;
    }

    $_SESSION["itemid"]=$_GET["itemid"];
?>

<html>
    <head>
        <title>Pagina del libro</title>
        <link rel='stylesheet' href='./styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src='comments.js'></script>
        <script src='buttons.js'></script>
    </head>
    <body>
        <div id="background">
            <div id='container'>
                <div id='top'>
                    <label id='title'>Libreria: Presta-Vendi</label>
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
                    $sql= "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro  WHERE Libro.IDlibro= ".$_SESSION['itemid']." and Tipo='Nuovo'";
                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();
                    $_SESSION['row']=$row;

                    $sql2 = "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro  WHERE Libro.IDlibro= ".$_SESSION['itemid']." and Tipo='Usato'";
                    $result2=$conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    $_SESSION['row2']=$row2;
                    echo "<div><p><a href='index.php'>Home </a> / <a href='catalogo.php'>Catalogo </a>/".$_SESSION['row']['Genere']." / ".$_SESSION['row']['Titolo']."</p></div>";
                    echo "<div id='flex-container'><div id='immagineSingola'><img id='fotoLibro' src='".$_SESSION['row']['Foto']."'></div>
                        <div id='caratteristicheLibro'><h3>".$_SESSION['row']['Titolo']."</h3> <br>
                        <p>Autore: ".$_SESSION['row']['Nome']." " .$_SESSION['row']['Cognome']."</p>
                        <p>Casa Editrice: ".$_SESSION['row']['CasaEditrice']."</p>
                        <p>Anno: ".$_SESSION['row']['Anno']."</p>
                        <p>Pagine: ".$_SESSION['row']['NumeroPagine']."</p>
                        <p>Lingua: ".$_SESSION['row']['Lingua']."</p>
                        <p>ISBN-10: ".$_SESSION['row']['ISBN10']."</p>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(".$_SESSION['row']['Prezzo'].", ".$_SESSION['row']['Copie'].", ".$_SESSION['logged'].", `Nuovo`)' name='tipoAcquisto'>Nuovo: € ".$_SESSION['row']['Prezzo']."</button>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(".$_SESSION['row2']['Prezzo'].", ".$_SESSION['row2']['Copie'].", ".$_SESSION['logged'].", `Usato`)' name='tipoAcquisto'>Usato: € ".$_SESSION['row2']['Prezzo']."</button>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(0, ".$_SESSION['row2']['Copie'].", ".$_SESSION['logged'].")' name='tipoAcquisto'>Prestito</button></div>
                        <div id='pulsantiAcquisto'>";
                    
                    echo "
                        <h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                        <label for='copie'>Quantita: </label><input id='numerolibri' type='number' value='1' min='1' max='".$_SESSION['row']['Copie']."'>";
                    if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                        echo "<button type='submit' id='nuovo' class='btn btn-warning' onclick='ajaxCarrello()' id='".$_SESSION['row']['Tipo']."'>Aggiungi al carrello</button></div>";
                    }else{
                        $alert= "Hai bisogno di effettuare il login";           
                        echo "<button type='submit' id='tipologia' class='btn btn-warning'  id='".$_SESSION['row']['Tipo']."' title='Devi effettuare il login' disabled>Aggiungi al carrello</button></div>";
                    }
                    
                    echo "</div>";
                ?>

                <div class="commenti">		
                    <h2>Commenti</h2>		
                    <form method="POST" id="commentForm">
                        <div class="form-group">
                            <?php
                                if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){ 
                                    echo"<input type='text' name='commentatore' id='commentatore' class='form-control' placeholder='Insersci username' required />";
                                }
                                else{
                                    echo 'Hai bisogno di effettuare il login per commentare';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <textarea name="corpo" id="corpo" class="form-control" placeholder="Inserisci commento" rows="5" required></textarea>
                        </div>
                        <span id="message"></span>
                        <div class="form-group">
                            <input type='hidden' name='idcorpo' id='idcorpo' value='0' />
                            <?php
                                if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' />";
                                }else{      
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' disabled/>";
                                }
                            ?>
                        </div>
                    </form>
                    <div id="showComments"></div>   
                </div>	
            </div>
        </div>
    </body>
=======
<?php
    session_start();
    if(!isset($_SESSION["logged"])){
        $_SESSION["logged"]=false;
    }

    $_SESSION["itemid"]=$_GET["itemid"];
?>

<html>
    <head>
        <title>Pagina del libro</title>
        <link rel='stylesheet' href='./styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src='comments.js'></script>
        <script src='buttons.js'></script>
    </head>
    <body>
        <div id="background">
            <div id='container'>
                <div id='top'>
                    <label id='title'>Libreria: Presta-Vendi</label>
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
                    $sql= "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro  WHERE Libro.IDlibro= ".$_SESSION['itemid']." and Tipo='Nuovo'";
                    $result=$conn->query($sql);
                    $row = $result->fetch_assoc();
                    $_SESSION['row']=$row;

                    $sql2 = "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro  WHERE Libro.IDlibro= ".$_SESSION['itemid']." and Tipo='Usato'";
                    $result2=$conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    $_SESSION['row2']=$row2;
                    echo "<div><p><a href='index.php'>Home </a> / <a href='catalogo.php'>Catalogo </a>/".$_SESSION['row']['Genere']." / ".$_SESSION['row']['Titolo']."</p></div>";
                    echo "<div id='flex-container'><div id='immagineSingola'><img id='fotoLibro' src='".$_SESSION['row']['Foto']."'></div>
                        <div id='caratteristicheLibro'><h3>".$_SESSION['row']['Titolo']."</h3> <br>
                        <p>Autore: ".$_SESSION['row']['Nome']." " .$_SESSION['row']['Cognome']."</p>
                        <p>Casa Editrice: ".$_SESSION['row']['CasaEditrice']."</p>
                        <p>Anno: ".$_SESSION['row']['Anno']."</p>
                        <p>Pagine: ".$_SESSION['row']['NumeroPagine']."</p>
                        <p>Lingua: ".$_SESSION['row']['Lingua']."</p>
                        <p>ISBN-10: ".$_SESSION['row']['ISBN10']."</p>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(".$_SESSION['row']['Prezzo'].", ".$_SESSION['row']['Copie'].", ".$_SESSION['logged'].", `Nuovo`)' name='tipoAcquisto'>Nuovo: € ".$_SESSION['row']['Prezzo']."</button>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(".$_SESSION['row2']['Prezzo'].", ".$_SESSION['row2']['Copie'].", ".$_SESSION['logged'].", `Usato`)' name='tipoAcquisto'>Usato: € ".$_SESSION['row2']['Prezzo']."</button>
                        <button class='btn btn-warning' id='tipologia' value='' onclick='tipoProdotto(0, ".$_SESSION['row2']['Copie'].", ".$_SESSION['logged'].")' name='tipoAcquisto'>Prestito</button></div>
                        <div id='pulsantiAcquisto'>";
                    
                    echo "
                        <h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                        <label for='copie'>Quantita: </label><input id='numerolibri' type='number' value='1' min='1' max='".$_SESSION['row']['Copie']."'>";
                    if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                        echo "<button type='submit' id='nuovo' class='btn btn-warning' onclick='ajaxCarrello()' id='".$_SESSION['row']['Tipo']."'>Aggiungi al carrello</button></div>";
                    }else{
                        $alert= "Hai bisogno di effettuare il login";           
                        echo "<button type='submit' id='tipologia' class='btn btn-warning'  id='".$_SESSION['row']['Tipo']."' title='Devi effettuare il login' disabled>Aggiungi al carrello</button></div>";
                    }
                    
                    echo "</div>";
                ?>

                <div class="commenti">		
                    <h2>Commenti</h2>		
                    <form method="POST" id="commentForm">
                        <div class="form-group">
                            <?php
                                if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){ 
                                    echo"<input type='text' name='commentatore' id='commentatore' class='form-control' placeholder='Insersci username' required />";
                                }
                                else{
                                    echo 'Hai bisogno di effettuare il login per commentare';
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <textarea name="corpo" id="corpo" class="form-control" placeholder="Inserisci commento" rows="5" required></textarea>
                        </div>
                        <span id="message"></span>
                        <div class="form-group">
                            <input type='hidden' name='idcorpo' id='idcorpo' value='0' />
                            <?php
                                if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' />";
                                }else{
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' disabled/>";
                                }
                            ?>
                        </div>
                    </form>
                    <div id="showComments"></div>   
                </div>	
            </div>
        </div>
    </body>
>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
</html>