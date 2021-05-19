<?php
    session.start();
    include('db_connect.php');
    $sql= "SELECT * FROM CarrelloLibri JOIN Utente ON Utente.CodFiscale=$_SESSION['codFisc'] JOIN";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
?>