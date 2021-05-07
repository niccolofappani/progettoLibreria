<?php
    $host = "localhost:3310";
    $user = "root";
    $pass = "";
    $db = "libreria";
    // connessione al DBMS
    $connessione = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
    
    $query="insert into Libro(ISBN, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, Prezzo, CodAutore)
    values(".$_SESSION['ISBN'].",".$_SESSION['Titolo'].",".$_SESSION['Genere'].",".$_SESSION['CasaEditrice'].",".$_SESSION['NumeroPagine'].",".$_SESSION['Lingua'].",".$_SESSION['Prezzo'].",".$_SESSION['CodAutore'].");";
    
    $result = mysqli_query($connessione, $query) or
    
    die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_error($connessione));
    
    mysqli_close($connessione) or die("Chiusura connessione fallita " . mysqli_error($connessione));
?>