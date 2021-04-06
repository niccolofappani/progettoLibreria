<?php
    session_start();
    echo "<html>
    <head>
        <title>Document</title>
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
            <div id='Image'>
                <img id='logo' src='libro.png' alt='libro'>
            </div>
            <div id='buttons'>
                
                <h3><input type='button'  class='btn btn-warning' id='login' value='Login' data-toggle='modal' data-target='#logging'></input> 
                <input type='button'  class='btn btn-warning' id='signUp' value='Registrati' onclick='document.location='SignUp.php''></input>
                |  <button id='cart'><i class='fa fa-shopping-cart'></i></button></h3>
            </div>
            
                <form method='get' action='registered.php'>
                   <legend>Registrazione</legend>
                   <label for='name'>Nome: </label> <input type='text' id='name' placeholder='Mario' required> <br>
                   <label for='surname'>Cognome: </label> <input type='text' id='surname' placeholder='Rossi' required> <br> 
                   <label for='email'>e-mail: </label> <input type='email' id='email' placeholder='example@gmail.com' required> <br>
                   <label for='psw'>Password: </label> <input type='password' id='psw' placeholder='******' required> <br>
                   <label for='codFisc'>Codice Fiscale: </label> <input type='text' id='codFisc' required> <br>
                   <label for='address'>Via: </label> <input type='text' id='address'> <br>
                   <label for='number'>Numero Civico: </label> <input type='number' id='number' min='1'> <br>
                   <label for='cap'>Codice Postale: </label> <input type='number' id='cap' placeholder='12345'> <br>
                   </form>

                
            </div>
      </div>
    </body>
    </html>"
?>