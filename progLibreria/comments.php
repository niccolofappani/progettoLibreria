<?php
    include_once("db_connect.php");
    if(!empty($_POST["Commentatore"]) && !empty($_POST["Corpo"])){
        $insertComments = "INSERT INTO Commento (idcorpo, corpo, commentatore) VALUES ('".$_POST["IDCorpo"]."', '".$_POST["Corpo"]."', '".$_POST[Commentatore]."')";
        mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
        $message = '<label class="text-success">Commento inviato con successo.</label>';
        $status = array(
            'error'  => 0,
            'message' => $message
        );	
    } else {
        $message = '<label class="text-danger">Errore: Commento non inviato.</label>';
        $status = array(
            'error'  => 1,
            'message' => $message
        );	
    }

    echo json_encode($status);
?>