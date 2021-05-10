<!DOCTYPE html>
<html>
    <head>
    

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h1>Pagina di amministrazione</h1>
            <div>
                <h3>Azioni da amministratore</h3>
                <form method="get" action="getQuery.php">
                  <p>Visualizza lista libri</p>
                  <button type="submit">Visualizza</button>
                </form>
                <form method="post" action="insert.php">
                  <p>Inserisci libri</p>
                  <button>Invio</button>
                </form>

              
            </div>
        </center>
    </body>
</html>