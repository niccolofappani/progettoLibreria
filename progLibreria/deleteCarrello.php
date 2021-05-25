<?php
session_start();
    include('db_connect.php');

    if ($conn->connect_error) { //fallimento della connessione
        die('Connection failed: ' . $conn->connect_error);
    }


    $tipo = urldecode($_POST['itemTipo']);
    $id = json_decode($_POST['itemId']);

    $sql2= "DELETE FROM CarrelloLibri WHERE CarrelloLibri.IDLibro=".$id." AND CarrelloLibri.Tipo='".$tipo."'";
    $result=$conn->query($sql2);

    
?>