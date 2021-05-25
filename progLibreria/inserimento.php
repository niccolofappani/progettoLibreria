<<<<<<< HEAD
<html>
    <head>
        <title>Inserimento</title>
        <link rel='stylesheet' href='styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
         
    </head>
    <body>
        <div id='container'>
            <a href=index.php><img id='logo' src='img/libro.png' alt='libro'></a>

            <div id='top'>
                    <label id='title'>Libreria di Scandicci</label>
                </div>

            <div id='buttons'>
            <input type="button" class="btn btn-warning" id="getQuery" value="Catalogo" onclick="document.location='getQuery.php'"></input> 
                <button id='cart'><i class='fa fa-shopping-cart'></i></button>
            </div>
                <form method='post' action='insert.php'>
                <div class='form-group'>
                    <label>ISBN</label>
                    <input type='text' class='form-control w-50' placeholder='ISBN' required name='ISBN'>
                </div>
                <div class='form-group'>    
                    <label>Titolo</label>
                    <input type='text' class='form-control w-50' placeholder='Titolo' required name='Titolo'>
                </div>
                <div class='form-group'>
                    <label>Genere</label>
                    <input type='text' class='form-control w-50' placeholder='Genere' required name='Genere'>
                </div>
                <div class='form-group'>
                    <label>Casa Editrice</label>
                    <input type='text' class='form-control w-50' placeholder='Casa Editrice' required name='CasaEditrice'>
                </div>
                <div class='form-group'>
                    <label>Numero Pagine</label>
                    <input type='number' class='form-control w-50' placeholder='Numero Pagine' required name='NumeroPagine'>
                </div>
                <div class='form-group'>
                    <label>Lingua</label>
                    <input type='text' class='form-control w-50' placeholder='Lingua' required name='Lingua'>
                </div>
                <div class='form-group'>
                    <label>CodAutore</label>
                    <input type='number' class='form-control w-50' placeholder='Codice autore' required name='CodAutore'>
                </div>
                <div class='form-group'>
                    <label>Prezzo</label>
                    <input type='number' class='form-control w-50' placeholder='Prezzo' required name='Prezzo'>
                </div>
                <div class='form-group'>
                    <label>Numero Libri nuovi</label>
                    <input type='number' class='form-control w-50' placeholder='Numero libri nuovi' required name='NumeroLibriNuovi'>
                </div>
                <div class='form-group'>
                    <label>Numero Libri usati</label>
                    <input type='number' class='form-control w-50' placeholder='Numero libri usati' required name='NumeroLibriUsati'>
                </div>
                <button type='submit' class='btn btn-primary'>Inserisci</button>
                </form>
            </div>
        </div>
    </body>
</html>

=======
<html>
    <head>
        <title>Inserimento</title>
        <link rel='stylesheet' href='styles.css'  type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
         
    </head>
    <body>
        <div id='container'>
            <a href=index.php><img id='logo' src='img/libro.png' alt='libro'></a>

            <div id='top'>
                    <label id='title'>Libreria di Scandicci</label>
                </div>

            <div id='buttons'>
            <input type="button" class="btn btn-warning" id="getQuery" value="Catalogo" onclick="document.location='getQuery.php'"></input> 
                <button id='cart'><i class='fa fa-shopping-cart'></i></button>
            </div>
                <form method='post' action='insert.php'>
                <div class='form-group'>
                    <label>ISBN</label>
                    <input type='text' class='form-control w-50' placeholder='ISBN' required name='ISBN'>
                </div>
                <div class='form-group'>    
                    <label>Titolo</label>
                    <input type='text' class='form-control w-50' placeholder='Titolo' required name='Titolo'>
                </div>
                <div class='form-group'>
                    <label>Genere</label>
                    <input type='text' class='form-control w-50' placeholder='Genere' required name='Genere'>
                </div>
                <div class='form-group'>
                    <label>Casa Editrice</label>
                    <input type='text' class='form-control w-50' placeholder='Casa Editrice' required name='CasaEditrice'>
                </div>
                <div class='form-group'>
                    <label>Numero Pagine</label>
                    <input type='number' class='form-control w-50' placeholder='Numero Pagine' required name='NumeroPagine'>
                </div>
                <div class='form-group'>
                    <label>Lingua</label>
                    <input type='text' class='form-control w-50' placeholder='Lingua' required name='Lingua'>
                </div>
                <div class='form-group'>
                    <label>CodAutore</label>
                    <input type='number' class='form-control w-50' placeholder='Codice autore' required name='CodAutore'>
                </div>
                <div class='form-group'>
                    <label>Prezzo</label>
                    <input type='number' class='form-control w-50' placeholder='Prezzo' required name='Prezzo'>
                </div>
                <div class='form-group'>
                    <label>Numero Libri nuovi</label>
                    <input type='number' class='form-control w-50' placeholder='Numero libri nuovi' required name='NumeroLibriNuovi'>
                </div>
                <div class='form-group'>
                    <label>Numero Libri usati</label>
                    <input type='number' class='form-control w-50' placeholder='Numero libri usati' required name='NumeroLibriUsati'>
                </div>
                <button type='submit' class='btn btn-primary'>Inserisci</button>
                </form>
            </div>
        </div>
    </body>
</html>

>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
