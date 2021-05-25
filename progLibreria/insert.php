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

    $sql = "select Libro.IDLibro From Libro Where Libro.ISBN10 = '$ISBN'";
    
    
    if($conn->query($query) === TRUE){
      if($LibriNuovi > 0 && $LibriUsati == 0){
        $query2="insert into TipoLIbro(Copie,Prezzo)
         values('$LibriNuovi', '$Prezzo')";
      }
      else if ($LibriUsati > 0 && $LibriNuovi == 0){
        $query2="insert into TipoLIbro(Copie,Prezzo)
        values('$LibriUsati', '$Prezzo')";
      }
      else {
        $query2="insert into TipoLIbro(Copie,Prezzo)
        values('$LibriNuovi', '$Prezzo'),
        values('$LibriUsati', '$Prezzo')";
      }
      echo "Inserito con successo";
      echo "<form action='getQuery.php'><input type='submit' value='Catalogo' class='homebutton' id='btnHome' /></form>";
      }
    }else{
      echo "Error:". $query . "<br>" . $conn->error;
    }
    $conn->close();
?>