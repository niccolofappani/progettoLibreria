$(document).ready(function(){ 
	showComments();
	$('#commentForm').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: "comments.php",
			method: "POST",
			data: formData,
			dataType: "JSON",
			success:function(response) {
				if(!response.error) {
					$('#commentForm')[0].reset();
					$('#idcorpo').val('0');
					$('#message').html(response.message);
					showComments();
				} else if(response.error){
					$('#message').html(response.message);
				}
			}
		})
	});
});

//visualizzazione commenti degli altri utenti
function showComments() {
	$.ajax({
		url:"showComments.php",
		method:"POST",
		success:function(response) {
			$('#showComments').html(response);
		}
	})
}