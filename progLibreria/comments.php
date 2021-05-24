<?php
    if(!empty($_POST[$_SESSION['user']]) && !empty($_POST["corpo"])){
        $insertComments = "INSERT INTO comment (idcorpo, corpo, commentatore) VALUES ('".$_POST["IDCorpo"]."', '".$_POST["Corpo"]."', '".$_POST[$_SESSION['user']]."')";
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