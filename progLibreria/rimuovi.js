function rimozione(IDLibro, Tipo){
    $.ajax({
        type : "POST", 
        url : "deleteCarrello.php",
        dataType: "json",
        data : {
            itemId :IDLibro,
            itemTipo: Tipo
        },
        success: window.location.reload()
        
    })
}