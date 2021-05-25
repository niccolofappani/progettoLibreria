<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "libreria";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { //fallimento della connessione
      die("Connection failed: " . $conn->connect_error);
    }
    
    $ISBN=$_POST['ISBN'];
    $Titolo=$_POST['Titolo'];
    $Genere=$_POST['Genere'];
    $CasaEditrice=$_POST['CasaEditrice'];
    $NumPagine=$_POST['NumeroPagine'];
    $Lingua=$_POST['Lingua'];
    $CodAutore=$_POST['CodAutore'];
    $LibriNuovi = $_POST['NumeroLibriNuovi'];
    $LibriUsati = $_POST['NumeroLibriUsati'];
    $Prezzo = $_POST['Prezzo'];


    $query="insert into Libro(ISBN10, Titolo, Genere, CasaEditrice, NumeroPagine, Lingua, CodAutore)
            values('$ISBN','$Titolo','$Genere','$CasaEditrice','$NumPagine','$Lingua','$CodAutore')"; 

    
    if($conn->query($query) === TRUE){
    $sql = "select Libro.IDLibro From Libro Where Libro.ISBN10 = '$ISBN'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $sqlNuovo = "insert into (IDTipoLibro, Copie, Prezzo, Tipo) values($row,$LibriNuovi,$Prezzo,'Nuovo')";
      $sqlUsato = "insert into (IDTipoLibro, Copie, Prezzo, Tipo) values($row,$LibriUsati,$Prezzo/2,'Usato')";
    }
      echo "Inserito con successo";
      echo "<form action='getQuery.php'><input type='submit' value='Catalogo' class='homebutton' id='btnHome' /></form>";
    }else{
      echo "Error:". $query . "<br>" . $conn->error;
    }
    $conn->close();
?>