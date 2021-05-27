<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "libreria";
    // connessione al DBMS
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
    
    $psw = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    
    $sql="INSERT INTO utente(codFiscale, nome, cognome, email, psw, via, numeroCivico, CAP, citta)
    values('".$_POST['codFisc']."','".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."','".$psw."','".$_POST['via']."','".$_POST['numeroCivico']."','".$_POST['CAP']."','".$_POST['citta']."');";
    $result=$conn->query($sql);

    echo "<script>alert('registrazione effettuata')
    window.location.replace('index.php')</script>";
?>