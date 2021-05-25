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

    
}a