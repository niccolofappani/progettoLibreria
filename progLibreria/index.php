<?php
    session_start();
    include('header.php');
    include('db_connect.php');
?>
<html>
    <head>
        <title>Home</title>
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

            <div class="dropdown">
                <button class="dropbtn">Genere</button>
                <div class="dropdown-content">
                    <a href="#">Biografia</a>
                    <a href="#">Storico</a>
                    <a href="#">Giallo</a>
                    <a href="#">Thriller</a>
                    <a href="#">Avventura</a>
                    <a href="#">Fantascienza</a>
                    <a href="#">Fantasy</a>
                    <a href="#">Umorismo</a>
                    <a href="#">Ragazzi</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Prezzo</button>
                <div class="dropdown-content">
                    <a href="#">Fino a 5€</a>
                    <a href="#">5-10€</a>
                    <a href="#">10-15€</a>
                    <a href="#">15€+</a>
                </div>
            </div>

            <div  id="description">
                <p>
                    La libreria di Scandicci offre una vasta scelta di libri, sia per i grandi che per i piccini.
                    È possibile sia acquistare che prendere in prestito i libri, basta registrarsi e poi fare il 
                    login prima di compiere una delle due azioni. </br>
                    Per comprare un libro sarà necessario inserire i dati di pagamento, mentre per prenderlo 
                    in prestito sarà necessario inserire la data d'inizio del prestito e della fine (il prestito 
                    di un libro può durare al massimo un mese).
                </p>
            </div>
        </div>
    </body>
<?php 
    $conn->close() 
?>
</html>
