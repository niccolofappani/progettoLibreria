<?php
    session_start();
    $host = "localhost";
    $user = "";
    $pass = "";
    $db = "";
    // connessione al DBMS
    $connessione = mysqli_connect ($host, $user, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
    
    $query="insert into Persona(name, surname, email, psw, codFisc, address, number, cap)
    values('".$_SESSION["name"]."','".$_SESSION["surname"]."','".$_SESSION["email"]."','".$_SESSION["psw"]."','".$_SESSION["codFisc"]."','".$_SESSION["address"]."','".$_SESSION["number"]."','".$_SESSION["cap"]."');";
    
    $result = mysqli_query ($connessione, $query) or
    
    die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    
    mysqli_close ($connessione) or die("Chiusura connessione fallita " . mysqli_error ($connessione));
?>