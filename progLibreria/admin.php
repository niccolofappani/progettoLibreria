<!DOCTYPE html>
<html>
    <head>
    <script src="jquery-3.5.1.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h1>Pagina di amministrazione</h1>
            <div>
                <h3>Azioni da amministratore</h3>ù
                <form method="get" action="getQuery.php">
                  <p>Visualizza lista libri</p>
                  <button type="submit">Aggiorna</button>
                </form>
                <form method="post" action="insert.php">
                  <p>Inserisci libri</p>
                  <button>Invio</button>
                </form>

                <p>Modifica libro</p>
                <button>Modifica</button>
                <p>Elimina libro</p>
                <button>Elimina</button>
            </div>
        </center>
    </body>
</html>