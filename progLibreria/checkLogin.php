<?php
     session_start();
    $host = "127.0.0.1"; //TODO: finire il checkLogin e eliminare checkLogin.php
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
            setTimeout(function(){
                location.replace("admin.php")
            },1500)
            location.href ="admin.php";</script>';
        }
        else if(password_verify($_POST['psw'], $row['Psw'])){
            $_SESSION["logged"]=true;
            $_SESSION["user"]=$row['Nome'];
            $_SESSION["codFisc"]=$row["CodFiscale"];
            echo '<script>alert("Login effettuato");
            setTimeout(function(){
                location.replace("index.php")
            },1500)
            location.href ="index.php";</script>';
            }
        else{
            echo '<script>alert("Errore, Password errata");
            setTimeout(function(){
                location.replace("login.php")
            },1500)
            location.href ="login.php";</script>';
        }
    }else{
        echo '<script>alert("Errore, Email non registrata");
        setTimeout(function(){
            location.replace("login.php")
        },1500)
        location.href ="login.php";</script>';
    }
    mysqli_close($conn) or die("Chiusura connessione fallita".mysqli_error($conn));
?>