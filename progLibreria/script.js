const deleteButtons = document.querySelectorAll(".delete");

for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function() {
          $.ajax({
            type : "POST", 
            url : "delete.php",
            dataType: "json",
            success: window.location.reload(),
            data : {
                itemid :event.target.id
            }
        })
    })
}