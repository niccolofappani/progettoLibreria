<?php
    session_start();
    include('header.php');
    include('db_connect.php');
    include('modal.php');
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="styles.css"  type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <?php
                if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true){
                    echo "<button class='btn btn-danger' onclick=document.location='logout.php'>".$_SESSION['user'].", Logout<img src='img/logoutButton.png'></button>&nbsp
                    <button class='btn btn-secondary' id='cart' onclick=document.location='carrello.php'>Carrello <i class='fa fa-shopping-cart'></i></button>&nbsp";
                        
                }
                else{
                    echo "<form class='form-inline my-2 my-lg-0'>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#registerModal'>Registrazione</button>&nbsp&nbsp
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#loginModal'>Log-in</button>&nbsp&nbsp
                        <div class=input-group rounded'>
                            <input type='search' class='form-control rounded' placeholder='Cerca' aria-label='Search' aria-describedby='search-addon' />
                            <button class='btn btn-primary'><i class='fa fa-search'></i></button>
                        </div>
                        </form>";
                }
            ?>
        </div>
    </nav>
    <br><br>
        <div id="description">
            <p>
                La libreria Presta-Vendi è una delle più importanti librerie/biblioteche della regione Toscana, 
                ed offre una vasta scelta di libri, per ogni fascia di età.
                <br>
                Perché libreria/biblioteca? Perché Presta-Vendi non permette solo di acquistare libri nuovi o usati come altre librerie online,
                ma anche di prenderne in prestito.
                <br>
                Puoi visitare il nostro sito e vedere i libri disponibili senza un account, ma per effettuare acquisti o prestiti
                dovrai crearne uno.
                <br>
                Il prestito richiede il pagamento di una cauzione che corrisponde al prezzo del libro nuovo, che però verrà rimborsato
                una volta restituito il libro. Il periodo massimo di un prestito è di 30 giorni.
            </p>
        </div>
        <script src="catalogScript.js"></script>
    </body>
</html>
<?php 
    $conn->close();
?>