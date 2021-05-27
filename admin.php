


<!DOCTYPE html>
<html>
    <head>
      <title>Admin</title>
      <link rel="stylesheet" href="styles.css"  type="text/css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Libreria Presta-Vendi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="catalogo.php">Catalogo</a>
                </li>
            </ul>
        </div>
      </nav>
      <div id="headerAdmin">
        <label id="titoloAdmin">Pagina di amministrazione</label>
        <label id="labelHeaderAdmin">Benvenuto, amministratore</label>
      </div>
      <div id="adminBody">
        <div id="opzioniAdmin">
          <label>Visualizza database dei libri</label>
          <button class="btn btn-primary">Visualizza</button>
          <br><br><br>
          <label>Inserisci nuovo libro</label>
          <button class="btn btn-primary">Inserisci</button>
          <br><br><br>
          <label>Visualizza gli ordini dei clienti</label>
          <button class="btn btn-primary">Visualizza</button>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div id="corpoAdmin">
          <label>Elenco di libri</label>
        </div>
      </div>
    </body>
</html>