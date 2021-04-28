<!DOCTYPE html>
<html>
    <head>
        <title>Accesso</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <link rel="stylesheet" href="./styles.css"  type="text/css">
    </head>
    <body>
        <div id="background">
        </div>
            <div id='container'>
                <a href=index.php><img id="logo" src="img/libro.png" alt="libro"></a>
                <div id="top">
                    <label id="title">Libreria di Scandicci</label>
                </div>

                <div id='buttons'>
                    <h3><input type='button'  class='btn btn-warning' id='signUp' value='Registrati' onclick="document.location='SignUp.php'"></input>
                    <button id='cart'><i class='fa fa-shopping-cart'></i></button></h3>
                </div>

                <form method="post" action="login.php?checkLogin()">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control w-50" id="email" name="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control w-50" id="psw" name="psw" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </form>
            </div>
    </body>
</html>

<?php
    function checkLogin(){
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
                echo'<script>alert("Ciao mauro");
                setTimeout(function(){
                    location.replace("admin.php")
                },1500)
                location.href ="admin.php";</script>';
            }
            else if(strcmp($array[0]['Psw'],  $_POST['psw']) == 0){
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
    }
?>
