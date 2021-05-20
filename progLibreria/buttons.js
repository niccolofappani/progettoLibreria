function tipoProdotto(Prezzo, Quantita, loggato, tipo){ 
    if(loggato==true){ 
    document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <label for='copie'>Quantita: </label><input type='number' id='numerolibri' value='1' min="+1+" max='"+Quantita+"'></input><button id='"+tipo+"' type='submit' class='btn btn-warning' onclick=ajaxCarrello()>Aggiungi al carrello</button></div>"
    }else{
        document.getElementById("pulsantiAcquisto").innerHTML ="<h2>Totale: € "+Prezzo+"</h2> <label for='copie'>Quantita: </label><input type='number' name='numerolibri' value='1' min="+1+" max='"+Quantita+"'><button id='"+tipo+"' type='submit' class='btn btn-warning' title='devi effettuare il login' disabled>Aggiungi al carrello</button></div>"
    }

}

function ajaxCarrello(){
    


          $.ajax({
            type : "POST", 
            url : "aggiungiCarrello.php",
            dataType: "json",
            data : {
                itemTipo :event.target.id,
                numero: document.getElementById("numerolibri").value
            },
            success: document.getElementById("flex-container").innerHTML = "<h2>aggiunto al carrello</h2><button onclick=document.location='carrello.php'>Vai al carrello</button><button onclick=document.location='catalogo.php'>Continua ad acquistare</button>"
            
        })
    
}
