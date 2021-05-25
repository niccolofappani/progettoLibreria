<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='./styles.css'  type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h1>Pagina di amministrazione</h1>
            <div>
                <h3>Azioni da amministratore</h3>

                <form method="get" action="getQuery.php" id="amministratore">
                  <p>Visualizza catalogo libri</p>
                  <button type="submit">Visualizza</button>
                </form>

                <form method="post" action="inserimento.php" id="amministratore">
                  <p>Inserisci libri</p>
                  <button>Inserisci</button>
                </form>
                
                <form method="get" action="getOrder.php" id="amministratore">
                  <p>Visualizza ordini</p>
                  <button type="submit">Visualizza</button>
                </form>

                <form method="get" action="index.php" id="amministratore">
                  <p>Torna alla home</p>
                  <button type="submit">Home</button>
                </form>
            </div>
        </center>
    </body>
</html>