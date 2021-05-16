<?php
    session_start();
    $host = "localhost:3310";
    $user = "root";
    $pass = "";
    $db = "libreria";
    // connessione al DBMS
    $connessione = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
    
    $query="insert into CarrelloLibri(IDlibro, Quantita, IDcarrello)
    values(".$_SESSION['itemid'].",".$_POST['numeroLibri'].",".$_SESSION["IDcarrello"].");";
    echo "PORCODIO!!!!!!!!!!!! funzionaaaaaaaaaaaaaaaaaaaaaaaaaa";
    echo "<button onclick=document.location='carrello.php'></button>Vai al carrello</button>"
    $result = mysqli_query($connessione, $query) or
    
    die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_error($connessione));
    
    mysqli_close($connessione) or die("Chiusura connessione fallita " . mysqli_error($connessione));
?>
