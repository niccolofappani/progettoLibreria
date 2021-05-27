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
        <link rel="stylesheet" href="styles.css"  type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Libreria Presta-Vendi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="catalogo.php">Catalogo</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#registerModal'>Registrazione</button>&nbsp&nbsp
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#loginModal'>Log-in</button>&nbsp&nbsp
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Cerca" aria-label="Search" aria-describedby="search-addon" />
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>  
        </nav>

                <?php
                    echo "
                    <div id='flex-container'>
                        <div id='immagineSingola'>
                            <img id='fotoLibro' src='".$_SESSION['row']['Foto']."'>
                        </div>
                        <div id='caratteristicheLibro'><h3>".$_SESSION['row']['Titolo']."</h3> <br>
                            <p>Autore: ".$_SESSION['row']['Nome']." " .$_SESSION['row']['Cognome']."</p>
                            <p>Casa Editrice: ".$_SESSION['row']['CasaEditrice']."</p>
                            <p>Anno: ".$_SESSION['row']['Anno']."</p>
                            <p>Pagine: ".$_SESSION['row']['NumeroPagine']."</p>
                            <p>Lingua: ".$_SESSION['row']['Lingua']."</p>
                            <p>ISBN-10: ".$_SESSION['row']['ISBN10']."</p>
                            <button type='submit' onclick='tipoProdotto(".$_SESSION['row']['Prezzo'].", ".$_SESSION['row']['QuantitaVendita'].", ".$_SESSION['logged'].")'   value='1' name='tipoAcquisto' class='tipologia'>Nuovo: € ".$_SESSION['row']['Prezzo']."</button>
                            <button type='submit' onclick='tipoProdotto(".$_SESSION['row']['PrezzoUsato'].", ".$_SESSION['row']['QuantitaUsato'].", ".$_SESSION['logged'].")'   value='2' name='tipoAcquisto' class='tipologia'>Usato: € ".$_SESSION['row']['PrezzoUsato']."</button>
                            <button type='submit' onclick='tipoProdotto(0, ".$_SESSION['row']['QuantitaUsato'].", ".$_SESSION['logged'].")'   value='3' name='tipoAcquisto' class='tipologia'>Prestito: -</button>
                        </div>
                        <div id='pulsantiAcquisto'>";
                        //errore
                    /*echo "
                            <h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                            <form action='aggiungiCarrello.php' method='post'>
                                <label for='copie'>Quantita: </label>
                                <input id='numerolibri' type='number' name='copie' value='1' min='1' max='".$_SESSION['row']['QuantitaVendita']."'>";
                    if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                        echo "
                                <button type='submit' id='buttonCarrello'>Aggiungi al carrello</button>
                            </form>
                        </div>";
                    }else{
                        $alert= "Hai bisogno di effettuare il login";
                        echo "
                        <button id='buttonCarrello type='submit'  title='devi effettuare il login' disabled>Aggiungi al carrello</button>";*/
                        //errore
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
                    
                    echo "<h2>Totale: € ".$_SESSION['row']['Prezzo']."</h2>
                        <label for='copie'>Quantita: </label><input id='numerolibri' type='number' value='1' min='1' max='".$_SESSION['row']['Copie']."'>";
                    if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                        echo "<button type='submit' id='nuovo' class='btn btn-warning' onclick='ajaxCarrello()' id='".$_SESSION['row']['Tipo']."'>Aggiungi al carrello</button></div>";
                    }else{
                        $alert= "Hai bisogno di effettuare il login";           
                        echo "<button type='submit' id='tipologia' class='btn btn-warning'  id='".$_SESSION['row']['Tipo']."' title='Devi effettuare il login' disabled>Aggiungi al carrello</button></div>";
                    }
                    
                    echo "</div>
                    <script src='buttons.js'></script>";
                ?>

                <!--<div class="commenti">		
                    <h2>Commenti</h2>		
                    <form method="POST" id="commentForm">
                        <div class="form-group">
                            <?php
                                /*if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){ 
                                    echo"<input type='text' name='commentatore' id='commentatore' class='form-control' placeholder='Insersci username' required />";
                                }
                                else{
                                    echo 'Hai bisogno di effettuare il login per commentare';
                                }*/
                            ?>
                        </div>
                        <div class="form-group">
                            <textarea name="corpo" id="corpo" class="form-control" placeholder="Inserisci commento" rows="5" required></textarea>
                        </div>
                        <span id="message"></span>
                        <div class="form-group">
                            <input type='hidden' name='idcorpo' id='idcorpo' value='0' />
                            <?php
                                /*if(isset($_SESSION["logged"]) and $_SESSION["logged"]==true){
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' />";
                                }else{      
                                    echo "<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Invia' disabled/>";
                                }*/
                            ?>
                        </div>
                    </form>
                    <div id="showComments"></div>   
                </div>-->
    </body>
</html>