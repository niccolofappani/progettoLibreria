<?php
     session_start();
    $host = "127.0.0.1"; //TODO: finire il checkLogin e eliminare checkLogin.php
    $user = "root";
    $pass = "";
    $db = "libreria";
    $connessione = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita".mysqli_connect_error());
    $sql = "SELECT * FROM Utente WHERE Email = '" . $_POST['email'] . "';";
    $result = mysqli_query($connessione, $sql);
    $array[0] = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) != 0) {
        if($_POST["email"] == "admin@gmail.com" && $_POST["psw"] == "admin"){
            echo'<script>alert("Benvenuto nella sezione amministrazione");
            setTimeout(function(){
                location.replace("admin.php")
            },1500)
            location.href ="admin.php";</script>';
        }
        else if(strcmp($array[0]['Psw'],  $_POST['psw']) == 0){
            $_SESSION["logged"]=true;
            $_SESSION["user"]=$array[0]['Nome'];
            $_SESSION["codFisc"]=$array[0]["CodFiscale"];
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
    mysqli_close($connessione) or die("Chiusura connessione fallita".mysqli_error($connessione));
?>