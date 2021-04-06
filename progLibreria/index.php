<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"  type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
</head>
<body>
    <div id="background"></div>

    <div id="container">
        <div id="top">
            <img id="logo" src="img/libro.png" alt="libro">
            <label id="title">Libreria di Scandicci</label>
            <form id="searchForm">
                <input id="searchBar" type="search" placeholder="Cerca..."></input>
                <button id="searchButton"><img src="img/searchIcon.png"></button>
            </form>
        </div>
            
        <div id="buttons">
            <h3>
                <input type="button" class="btn btn-warning" id="login" value="Login" data-toggle="modal" data-target="#logging"></input> 
                <input type="button" class="btn btn-warning" id="signUp" value="Registrati" onclick="document.location='SignUp.php'"></input>
                <button id="cart"><i class="fa fa-shopping-cart"></i></button>
            </h3>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Genere</button>
            <div class="dropdown-content">
                <a href="#">Biografia</a>
                <a href="#">Storico</a>
                <a href="#">Giallo</a>
                <a href="#">Thriller</a>
                <a href="#">Avventura</a>
                <a href="#">Fantascienza</a>
                <a href="#">Fantasy</a>
                <a href="#">Umorismo</a>
                <a href="#">Ragazzi</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Prezzo</button>
            <div class="dropdown-content">
                <a href="#">Fino a 5€</a>
                <a href="#">5-10€</a>
                <a href="#">10-15€</a>
                <a href="#">15€+</a>
            </div>
        </div>

    </div>
    
    <div class="modal fade" id="logging" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="loginPage">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" id="loginClose">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="get" action="accept.html">
                        <label for="email">Email: </label><input type="email" id="email" placeholder="example@example.com" required> <br>
                        <label for="psw">Password: </label><input type="password" id="psw" required> <br>
                        <button type="submit" class="btn btn-light">Accedi</button> 
                        <button type="reset" class="btn btn-secondary">Annulla</button> 
                    </form>
                </div>
            </div>
        </div>
        <div id="content-body">
        </div>
    </div>
</body>
</html>