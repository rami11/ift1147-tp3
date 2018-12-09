function loginButtonClicked() {
	var formData = $("#form-login").serialize();

	$.ajax({
		type : 'POST',
		url : 'users/loginController.php',
		data : formData,
		dataType: 'json',
		beforeSend: function() {
			$("#btn-login").html('Envoyer...');
		},
		success : function (response) {
			console.log(response);
			if(response.success) {

				// $(function () {
	   // 				$('#modal-login').modal('toggle');
				// });
				// location.reload();

				//$('#message').html(response.message);
				closeDialog('#modal-login');

	        } else {
	        	//alert(response);
	            $('#error').fadeIn(1000, function() {
	            	$('#error').html(
	            		'<div class="alert alert-danger alert-dismissible fade show" role="alert">' + response.message +
	            		'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
	 						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>'
	            	);
	                $('#btn-login').html('Se connecter');
	            });
	        }
		},
		fail : function (err) {
		}
	});
	return false;
}
