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
        <div id="background">
            <div id="container">
                <div id="top">
                    <label id="title">Libreria: Presta-Vendi</label>
                    <form id="searchForm">
                        <input id="searchBar" type="search" placeholder="Cerca..."></input>
                        <button id="searchButton"><img src="img/searchIcon.png"></button>
                    </form>
                </div>

                <input type='button' class='btn btn-warning' id='home' value='Home' onclick=document.location='index.php'></input>

                <?php
                if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true){ 
                    echo "<div id='buttons'>
                        <button id='profile'>Ciao ".$_SESSION['user']."</button>
                        <input type='button' class='btn btn-warning' id='catalogo' value='Catalogo' onclick=document.location='catalogo.php'></input>
                        <button id='cart'><i class='fa fa-shopping-cart'></i></button><br>
                        <button id='logoutButton' onclick=document.location='logout.php'>LOGOUT<img src='img/logoutButton.png'></button>
                    </div>";
                }else{
                    echo "<div id='buttons'>
                    <h3>
                        <input type='button' class='btn btn-warning' id='login' value='Login' onclick=document.location='login.php'></input>
                        <input type='button' class='btn btn-warning' id='signUp' value='Registrati' onclick=document.location='SignUp.php'></input>
                        <input type='button' class='btn btn-warning' id='catalogo' value='Catalogo' onclick=document.location='catalogo.php'></input>
                        <button id='cart'><i class='fa fa-shopping-cart'></i></button>
                    </h3>
                </div>";
                }
                ?>

                <div id="description">
                    <p>
                        La libreria di Scandicci offre una vasta scelta di libri, sia per i grandi che per i piccini.
                        È possibile sia acquistare che prendere in prestito i libri, basta registrarsi e poi fare il 
                        login prima di compiere una delle due azioni. </br>
                        Per comprare un libro sarà necessario inserire i dati di pagamento, mentre per prenderlo 
                        in prestito sarà necessario inserire la data d'inizio del prestito e della fine, con un massimo di 30 giorni.
                    </p>
                </div>
            </div>
        </div>
        <script src="catalogScript.js"></script>
    </body>
<?php 
    $conn->close();
?>
</html>
