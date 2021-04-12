<!DOCTYPE html>
<html>
    <head>
        <title>Accesso</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='styles.css'  type='text/css'>
    </head>
    <body>
        <div id="background"></div>
        
        <div id='container'>
            <a href=index.php><img id="logo" src="img/libro.png" alt="libro"></a>

            <div id="top">
                <label id="title">Libreria di Scandicci</label>
                <form id="searchForm">
                    <input id="searchBar" type="search" placeholder="Cerca..."></input>
                    <button id="searchButton"><img src="img/searchIcon.png"></button>
                </form>
            </div>

            <div id='buttons'>
                <h3><input type='button'  class='btn btn-warning' id='signUp' value='Registrati' onclick="document.location='SignUp.php'"></input>
                <button id='cart'><i class='fa fa-shopping-cart'></i></button></h3>
            </div>

            <form method="POST" action="index.php?type=login">
                <p id="title">Log-in</p>
                <input type="email" name="email" placeholder="* Email" required><br/>
                <input type="password" name="psw" placeholder="* Password" required><br/>
                <input class="button" type="submit" value="Log-in">
                <p id="registrati">Non hai un account? <a href="index.php?type=modulo">Registrati</a></p>
            </form>
        </div>
    </body>
</html>