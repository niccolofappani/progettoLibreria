<?php
    session_start();
    include('db_connect.php');
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="./styles.css"  type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="container">
            <a href="index.php"><img id="logo" src="img/libro.png" alt="libro"></a>
            <div id="top">
                <label id="title">Libreria di Scandicci</label>
                <form id="searchForm">
                    <input id="searchBar" type="search" placeholder="Cerca..."></input>
                    <button id="searchButton"><img src="img/searchIcon.png"></button>
                </form>
            </div>
            <?php
            if(isset($_SESSION['logged']) && $_SESSION['logged']==true){ 
                echo "<div id='buttons'>
                    <button id='profile'>Ciao ".$_SESSION['user']."</button>
                    <input type='button' class='btn btn-warning' id='catalogo' value='Catalogo' onclick=document.location='catalogo.php'></input>
                    <button id='cart'><i class='fa fa-shopping-cart'></i></button><br>
                    <button id='logoutButton' onclick=document.location='logout.php'>LOGOUT<img src='img/logoutButton.png'></button>
                </div>";
            }else{
                echo "<div id='buttons'>
                <h3>
                    <input type='button' class='btn btn-warning' id='login' value='Login' onclick=document.location='login.php'></input>
                    <input type='button' class='btn btn-warning' id='signUp' value='Registrati' onclick=document.location='SignUp.php'></input>
                    <input type='button' class='btn btn-warning' id='catalogo' value='Catalogo' onclick=document.location='catalogo.php'></input>
                    <button id='cart'><i class='fa fa-shopping-cart'></i></button>
                </h3>
            </div>";
            }




    $sql= "SELECT * FROM CarrelloLibri LEFT JOIN TipoLibro ON TipoLibro.IDTipoLibro=CarrelloLibri.IDLibro and TipoLibro.Tipo=CarrelloLibri.Tipo LEFT JOIN libro ON libro.IDLibro=TipoLibro.IDTipoLibro WHERE CarrelloLibri.IDutente='".$_SESSION['codFisc']."'";
    $result=$conn->query($sql);
    if($result){ 
        echo "<div id='contenitore-carrello'>";
        while($row = $result->fetch_assoc()){
            echo "<div class='articolo-carrello'>
            <form action='libroSingolo.php' method='get'><button type='submit' name='itemid' value='".$row['IDLibro']."' class='apriLibro'><img class='foto' src='".$row['Foto']."' alt='immagine'></button></form>
            <form action='libroSingolo.php' method='get'><button type='submit' name='itemid' value='".$row['IDLibro']."' class='apriLibro'>".$row['Titolo']."</button></form> <br>
            </div>";
        }

        echo "</div>";
        
    }else{
        echo "<p>Il carrello è vuoto</p>";
    }
?>