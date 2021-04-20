<?php
     
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "libreria";
    $connessione = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita".mysqli_connect_error());
    $sql = "SELECT * FROM utente WHERE email = '. $_POST['email'] .'";
    $result = mysqli_query($connessione, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) != 0) {
        if($row['psw'] == $_POST['psw']){
            echo scemo;
        }
    } else {
        echo scemo3;
    }
    mysqli_close($connessione) or die("Chiusura connessione fallita".mysqli_error($connessione));
?>