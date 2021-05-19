<?php
    session_start();
    include('db_connect.php');

    if ($conn->connect_error) { //fallimento della connessione
        die('Connection failed: ' . $conn->connect_error);
    }
    
    $sql="insert into carrelloLibri(IDlibro, IDutente, Quantita)
            values(".$_SESSION['itemid'].", '".$_SESSION['codFisc']."', ".$_POST['numerolibri'].")";
    echo $_POST["numerolibri"];
    echo $_SESSION["codFisc"];
    echo $_SESSION["itemid"];
    if($conn->query($sql) == TRUE){
        echo "<h2>aggiunto al carrello</h2>
                <button onclick=document.location='carrello.php'>Vai al carrello</button>
                <button onclick=document.location='catalogo.php'>Continua ad acquistare</button>";
    }else{
        echo "<h2>errore</h2>";
    }

?>