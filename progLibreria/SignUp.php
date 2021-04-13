<?php
    error_reporting(0);
    session_start();
    echo "<html>
    <head>
        <title>Registrazione</title>
        <link rel='stylesheet' href='styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
         
    </head>
    <body>
        <div id='background'></div>

        <div id='container'>
            <a href=index.php><img id='logo' src='img/libro.png' alt='libro'></a>

            <div id='top'>
                    <label id='title'>Libreria di Scandicci</label>
                </div>

            <div id='buttons'>
                <h3><input type='button' class='btn btn-warning' id='login' value='Login' onclick='document.location='login.php''></input> 
                <button id='cart'><i class='fa fa-shopping-cart'></i></button></h3>
            </div>
            
                <form>
                <div class='form-group'>
                    <label>Nome</label>
                    <input type='text' class='form-control w-50' placeholder='Nome' required>
                </div>
                <div class='form-group'>
                    <label>Cognome</label>
                    <input type='text' class='form-control w-50' placeholder='Cognome' required>
                </div>
                <div class='form-group'>
                    <label for='exampleInputEmail1'>Email</label>
                    <input type='email' class='form-control w-50' id='exampleInputEmail1' placeholder='E-mail' required>
                </div>
                <div class='form-group'>
                    <label for='exampleInputPassword1'>Password</label>
                    <input type='password' class='form-control w-50' id='exampleInputPassword1' placeholder='Password' required>
                </div>
                <div class='form-group'>
                    <label>Data di nascita</label>
                    <input type='date' class='form-control w-50' required>
                </div>
                <div class='form-group'>
                    <label>Codice Fiscale</label>
                    <input type='text' class='form-control w-50' placeholder='Codice Fiscale' required>
                </div>
                <div class='form-group'>
                    <label>Indirizzo</label>
                    <input type='text' class='form-control w-50' placeholder='Indirizzo' required>
                </div>
                <div class='form-group'>
                    <label>Codice Postale</label>
                    <input type='number' class='form-control w-50' placeholder='Codice Postale' required>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
                </form>
            </div>
        </div>
        <div class='modal fade' id='logging' role='dialog'>
        <div class='modal-dialog'>
            <div class='modal-content' id='loginPage'>
                <div class='modal-header'>
                    <h4 class='modal-title'>Login</h4>
                    <button type='button' class='close' data-dismiss='modal' id='loginClose'>&times;</button>
                </div>
                <div class='modal-body'>
                    <form method='get' action='accept.html'>
                        <label for='email'>Email: </label><input type='email' id='email' placeholder='example@example.com' required> <br>
                        <label for='psw'>Password: </label><input type='password' id='psw' required> <br>
                        <button type='submit' class='btn btn-light'>Accedi</button> 
                        <button type='reset' class='btn btn-secondary'>Annulla</button> 
                    </form>
                </div>
            </div>
        </div>
        <div id='content-body'>
        </div>
    </div>
    </body>
    </html>";
    $password=$_POST["psw"];
    $password=password_hash($password, PASSWORD_DEFAULT);
    $_SESSION["name"]=$_POST["name"];
    $_SESSION["surname"]=$_POST["surname"];
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["psw"]=$password;
    $_SESSION["codFisc"]=$_POST["codFisc"];
    $_SESSION["address"]=$_POST["address"];
    $_SESSION["number"]=$_POST["number"];
    $_SESSION["cap"]=$_POST["cap"];
?>