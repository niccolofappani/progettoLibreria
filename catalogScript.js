const deleteButtons = document.querySelectorAll(".genere");

for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function() {
          $.ajax({
            type : "GET", 
            url : "catalogo.php",
            dataType: "json",
            success: window.location.replace("catalogo.php"),
            data : {
                itemvalue :event.target.value
            }
        })
    })
}