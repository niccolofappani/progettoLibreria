<<<<<<< HEAD
const deleteButtons = document.querySelectorAll(".tipologia");

for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function() {
          $.ajax({
            type : "POST", 
            url : "libroSingolo.php",
            dataType: "json",
            success: window.location.reload(),
            data : {
                itemid :event.target.id
            }
        })
    })
=======
const deleteButtons = document.querySelectorAll(".tipologia");

for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function() {
          $.ajax({
            type : "POST", 
            url : "libroSingolo.php",
            dataType: "json",
            success: window.location.reload(),
            data : {
                itemid :event.target.id
            }
        })
    })
>>>>>>> 97ddb548cde7ae887c66fc5603f6bdb3df875c6d
}