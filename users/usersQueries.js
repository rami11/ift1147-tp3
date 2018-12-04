function loginButtonClicked() {
	var formData = $("#form-login").serialize();

	$.ajax({
		type : 'POST',
		url : '../users/loginController.php',
		data : formData,
		beforeSend: function() {
			//$("#error").fadeOut();
			$("#btn-login").html('Envoyer...');
		},
		success : function (response) {
			console.log(response);
			if(response == true) {
	            setTimeout(' window.location.href = "../index.php"; ', 1000);
	        } else {
	        	//alert(response);
	            $('#error').fadeIn(1000, function() {
	            	$('#error').html(
	            		'<div class="alert alert-danger alert-dismissible fade show" role="alert">' + response +
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