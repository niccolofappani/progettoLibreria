


<html>
    <head>
        <title>Catalogo</title>
        <link rel="stylesheet" href="./styles.css"  type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div id="container">
            <a href=index.php><img id="logo" src="img/libro.png" alt="libro"></a>

            <div id="top">
                <label id="title">Libreria di Scandicci</label>
                <form id="searchForm">
                    <input id="searchBar" type="search" placeholder="Cerca..."></input>
                    <button id="searchButton"><img src="img/searchIcon.png"></button>
                </form>
            </div>

            <?php
                session_start();


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "libreria";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) { //fallimento della connessione
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql= "SELECT * FROM libro LEFT JOIN Autore ON Libro.CodAutore = Autore.IDAutore LEFT JOIN LibroVendita ON Libro.IDLibro=LibroVendita.IDVendita LEFT JOIN LibroUsato ON Libro.IDlibro=LibroVendita.IDvendita WHERE Libro.IDlibro= ".$_GET['itemid'];
                $result=$conn->query($sql);
                $row = $result->fetch_assoc();
                echo "<div><p>Home / Catalogo /".$row["Genere"]." / ".$row["Titolo"]."</p></div>";
                echo "<div id='flex-container'><div id='immagineSingola'><img src='".$row["Foto"]."'></div>
                <div id='caratteristicheLibro'><h3>".$row["Titolo"]."</h3> <br>
                <p>Autore: ".$row["Nome"]." " .$row["Cognome"]."</p>
                <p>Casa Editrice: ".$row["CasaEditrice"]."</p>
                <p>Anno: ".$row["Anno"]."</p>
                <p>Pagine: ".$row["NumeroPagine"]."</p>
                <p>Lingua: ".$row["Lingua"]."</p>
                <p>ISBN-10: ".$row["ISBN10"]."</p></div></div>";

            ?>

        </div>
    </body>
</html>    