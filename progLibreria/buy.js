<<<<<<< HEAD
function verify(){
    $.ajax({
        type : "get", 
        url : "prePayment.php",
        dataType: "json",
        success: function (result){
            if(result=="true"){
                console.log("true")
                window.location.replace("finalPayment.php")
            }else{
                console.log("false");
                window.location.replace("formPayment.php")
            }
        }
        
    })

    
=======
function verify(){
    $.ajax({
        type : "get", 
        url : "prePayment.php",
        dataType: "json",
        success: function (result){
            if(result=="true"){
                console.log("true")
                window.location.replace("finalPayment.php")
            }else{
                console.log("false");
                window.location.replace("formPayment.php")
            }
        }
        
    })

    
>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
}a