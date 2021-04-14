<script>
    
</script>

<?php
    session_start();
    $host = "localhost:3310";
    $user = "root";
    $pass = "";
    $db = "libreria";
    // connessione al DBMS
    $connessione = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
    
    $query="insert into utente(codFisc, nome, cognome, email, psw, indirizzo, numeroCivico, CAP, citta)
    values(".$_SESSION['codFisc'].",".$_SESSION['nome'].",".$_SESSION['cognome'].",".$_SESSION['email'].",".$_SESSION['psw'].",".$_SESSION['indirizzo'].",".$_SESSION['numeroCivico'].",".$_SESSION['CAP'].",".$_SESSION['citta'].");";
    
    $result = mysqli_query($connessione, $query) or
    
    die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_error($connessione));
    
    mysqli_close($connessione) or die("Chiusura connessione fallita " . mysqli_error($connessione));
?>