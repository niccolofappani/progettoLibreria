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
            <div id='container'>
                <div id="top">
                    <label id="title">Libreria: Presta-Vendi</label>
                </div>

                <input type='button' class='btn btn-warning' id='home' value='Home' onclick=document.location='index.php'></input>

                <div id='buttons'>
                    <input type='button'  class='btn btn-warning' id='signUp' value='Registrati' onclick="document.location='SignUp.php'"></input>
                </div>

                <form method="post" action="checkLogin.php">
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
        </div>
    </body>
</html>