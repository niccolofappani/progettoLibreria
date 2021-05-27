<?php
    session_start();
    include('db_connect.php');
    include('modal.php');
    if(isset($_SESSION['codFisc'])){ 
    $sql="SELECT count(carrelloLibri.IDcarrellolibri) as conto FROM carrelloLibri WHERE CarrelloLibri.IDutente= '".$_SESSION["codFisc"]."'"; 
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    }
?>

<html>
    <head>
        <title>Catalogo</title>
        <link rel="stylesheet" href="styles.css"  type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Libreria Presta-Vendi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="catalogo.php">Catalogo</a>
                    </li>
                </ul>
                <?php
                if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true){
                    echo "
                    <label style='color: white'>Ciao, ". $_SESSION['user'] . "</label>&nbsp
                    <button class='btn btn-danger' onclick=document.location='logout.php'>Logout<img src='img/logoutButton.png'></button>&nbsp
                    <button class='btn btn-secondary' id='cart' onclick=document.location='carrello.php'>Carrello <i class='fa fa-shopping-cart'></i></button>&nbsp";
                        
                }
                else{
                    echo "<form class='form-inline my-2 my-lg-0'>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#registerModal'>Registrazione</button>&nbsp&nbsp
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#loginModal'>Log-in</button>&nbsp&nbsp
                        <div class=input-group rounded'>
                            <input type='search' class='form-control rounded' placeholder='Cerca' aria-label='Search' aria-describedby='search-addon' />
                            <button class='btn btn-primary'><i class='fa fa-search'></i></button>
                        </div>
                        </form>";
                }
                ?>
            </div>  
        </nav>
        
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "libreria";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) { //fallimento della connessione
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql= "SELECT Libro.IDlibro, Libro.Titolo, Libro.Genere, Libro.Foto, Autore.Nome, Autore.Cognome, TipoLibro.Prezzo FROM Libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN TipoLibro ON Libro.IDLibro=TipoLibro.IDTipoLibro WHERE Tipo='Nuovo';";
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<div id='ordinamento-libri'>";
                        echo $row['Foto'];
                        $i=1;
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <div class='libro'>
                                <div class='row'>
                                    <div class='col-md-3 col-sm-6'>
                                        <div class='product-grid'>
                                            <div class='product-image'>
                                                <button type='submit'>
                                                    <img class='foto' src='".$row['Foto']."' alt='immagine'>
                                                    <a href='#'><i class='fa fa-shopping-bag'></i> Add to cart</a>
                                                </button>
                                            </div>
                                            <div class='product-content'>
                                                <h3 class='title'><a href='#'>Women's Cotton Top</a></h3>
                                                <div class='price'>$79.99</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-3 col-sm-6'>
                                        <div class='product-grid'>
                                            <div class='product-image'>
                                                <a href='#' class='image'>
                                                    <img class='pic-1' src='images/img-2.jpg'>
                                                </a>
                                                <span class='product-sale-label'>Sale!</span>
                                                <ul class='product-links'>
                                                    <li><a href='#'><i class='fa fa-shopping-bag'></i> Add to cart</a></li>
                                                    <li><a href='#'><i class='fa fa-search'></i> Quick View</a></li>
                                                </ul>
                                            </div>
                                            <div class='product-content'>
                                                <h3 class='title'><a href='#'>Women's T-Shirt</a></h3>
                                                <div class='price'><span>$85.55</span> $71.11</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action='libroSingolo.php' method='get'>
                                    <button type='submit' name='itemid' value='".$row["IDlibro"]."' class='apriLibro'>
                                        <img class='foto' src='".$row['Foto']."' alt='immagine'>
                                    </button>
                                </form>
                                <br>
                                <form action='libroSingolo.php' method='get'>
                                    <button type='submit' name='itemid' value='".$row["IDlibro"]."' class='apriLibro'>".$row['Titolo']."</button>
                                </form> 
                                <br>
                                <p>Nuovo: ".$row['Prezzo']." €</p>
                            </div>";
                            if($i%6==0){
                                echo "<br>";
                            }
                            $i= $i +1;
                        }
                        echo "</div>";
                    }else {
                        echo "Database vuoto";
                    }
                ?>
            </div>
        </div>
    </body>
</html>

