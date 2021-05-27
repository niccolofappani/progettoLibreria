<?php
     session_start();
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "libreria";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita".mysqli_connect_error());
    $sql = "SELECT * FROM Utente WHERE Email = '" . $_POST['email'] . "';";
    $result=$conn->query($sql);
    $row= $result-> fetch_assoc();
    if ($result->num_rows > 0) {
        if($_POST["email"] == "admin@gmail.com" && $_POST["psw"] == "admin"){
            echo'<script>alert("Benvenuto nella sezione amministrazione");
            location.href ="admin.php";</script>';
        }
        else if(password_verify($_POST['psw'], $row['Psw'])){
            $_SESSION["logged"]=true;
            $_SESSION["user"]=$row['Nome'];
            $_SESSION["codFisc"]=$row["IDUtente"];
            echo '<script>alert("Login effettuato");
                history.go(-1);
                location.reload();
            </script>';
            }
        else{
            echo '<script>alert("Errore, Password errata");
                history.go(-1);
                location.reload;
            </script>';
        }
    }else{
        echo '<script>alert("Errore, Email non registrata");
            history.go(-1);
            location.reload
        </script>';
    }
    mysqli_close($conn) or die("Chiusura connessione fallita".mysqli_error($conn));
?>