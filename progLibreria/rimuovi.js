<<<<<<< HEAD
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
=======
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
>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
}