<?php
    session_start();
    include('db_connect.php');

    if ($conn->connect_error) { //fallimento della connessione
        die('Connection failed: ' . $conn->connect_error);
    }


    $tipo = urldecode($_POST['itemTipo']);
    $numero = json_decode($_POST['numero']);

    $sql2= "SELECT * FROM carrelloLibri LEFT JOIN TipoLibro ON TipoLibro.IDTipoLibro=carrelloLibri.IDLibro WHERE carrelloLibri.IDLibro=".$_SESSION['itemid']." AND carrelloLibri.Tipo='".$tipo."'";
    $result=$conn->query($sql2);
    if($result->num_rows > 0){
        $row2 = $result->fetch_assoc();
        $quantita=$row2['Quantita'] + $numero;
        if($quantita > $row2['Copie']){ 
            $sql2="UPDATE carrelloLibri SET carrelloLibri.Quantita = ".$row2['Copie']." WHERE carrelloLibri.IDLibro=".$_SESSION['itemid']." AND carrelloLibri.Tipo='".$tipo."'";
            $conn->query($sql2);
        }else{
            $sql2="UPDATE carrelloLibri SET carrelloLibri.Quantita = ".$quantita." WHERE carrelloLibri.IDLibro=".$_SESSION['itemid']." AND carrelloLibri.Tipo='".$tipo."'";
            $conn->query($sql2);
        }
    }else{
        
        $sql="INSERT INTO carrelloLibri(IDlibro, IDutente, Quantita, Tipo)
            values(".$_SESSION['itemid'].", ".$_SESSION['codFisc'].", ".$numero.", '".$tipo."')";
    
        $conn->query($sql);
    
    }

      
    
    

?>