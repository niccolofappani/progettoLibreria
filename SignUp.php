<?php
    session_start();
?>

<html>
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
        <div id="background">
            <div id='container'>
                <div id='top'>
                        <label id='title'>Libreria: Presta-Vendi</label>
                </div>

                <div id='buttons'>
                    <input type='button' class='btn btn-warning' id='home2' value='Home' onclick=document.location='index.php'></input>
                    <input type="button" class="btn btn-warning" id="login" value="Login" onclick="document.location='login.php'"></input>
                </div>
                
                <form method='post' action='registered.php'>
                    <div class='form-group'>
                        <label>Nome</label>
                        <input type='text' class='form-control w-50' placeholder='Nome' required name='nome'>
                    </div>
                    <div class='form-group'>
                        <label>Cognome</label>
                        <input type='text' class='form-control w-50' placeholder='Cognome' required name='cognome'>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Email</label>
                        <input type='email' class='form-control w-50' id='exampleInputEmail1' placeholder='E-mail' required name='email'>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Password</label>
                        <input type='password' class='form-control w-50' id='exampleInputPassword1' placeholder='Password' required name='psw' minlength="8">
                    </div>
                    <div class='form-group'>
                        <label>Codice Fiscale</label>
                        <input type='text' class='form-control w-50' placeholder='Codice Fiscale' required name='codFisc' pattern="^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$">
                    </div>
                    <div class='form-group'>
                        <label>Indirizzo</label>
                        <input type='text' class='form-control w-50' placeholder='Indirizzo' required name='indirizzo'>
                    </div>
                    <div class='form-group'>
                        <label>Numero Civico</label>
                        <input type='number' class='form-control w-50' placeholder='Numero Civico' required name='numeroCivico'>
                    </div>
                    <div class='form-group'>
                        <label>Codice Postale</label>
                        <input type='number' class='form-control w-50' placeholder='Codice Postale' required name='CAP'>
                    </div>
                    <div class='form-group'>
                        <label>Città</label>
                        <input type='text' class='form-control w-50' placeholder='Città' required name='citta'>
                    </div>
                    <button type='submit' class='btn btn-primary'>Registrati</button>
                </form>
            </div>
        </div>
    </body>
</html>
