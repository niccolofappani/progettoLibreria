function tipoProdotto(Prezzo, Quantita, loggato){ 
    if(loggato==true){ 
    document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <form action='aggiungiCarrello.php' method='post'><label for='copie'>Quantita: </label><input type='number' name='numerolibri' value='1' min="+1+" max='"+Quantita+"'></input><button id='buttonCarrello' type='submit' class='btn btn-warning'>Aggiungi al carrello</button></form></div>"
    }else{
        document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <form action='aggiungiCarrello.php' method='post'><label for='copie'>Quantita: </label><input type='number' name='numerolibri' value='1' min="+1+" max='"+Quantita+"'><button id='buttonCarrello' type='submit' class='btn btn-warning' title='devi effettuare il login' disabled>Aggiungi al carrello</button></form></div>"
    }

}
