function tipoProdotto(Prezzo, Quantita, loggato){ 
    if(loggato==true){ 
    document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <form action='' method='post'><label for='copie'>Quantita: </label><input type='number' name='copie' value='1' min="+1+" max='"+Quantita+"'><button id='buttonCarrello' type='submit'>Aggiungi al carrello</button></form></div>"
    }else{
        document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <form action='' method='post'><label for='copie'>Quantita: </label><input type='number' name='copie' value='1' min="+1+" max='"+Quantita+"'><button id='buttonCarrello' type='submit'  title='devi effettuare il login' disabled>Aggiungi al carrello</button></form></div>"
    }

}
