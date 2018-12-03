function loginButtonClicked() {
	var formData = $("#form-login").serialize();

	$.ajax({
		type : 'POST',
		url : '../users/loginController.php',
		data : formData,
		beforeSend: function() {
			$("#error").fadeOut();
			$("#btn-login").html('Envoyer...');
		},
		success : function (response) {
			 //alert(response);
			if(response == "ok") {
	            $('#btn-login').html('Signing In ...');
	            setTimeout(' window.location.href = "../index.php"; ', 1000);
	        } else {
	        	//alert(response);
	            $('#error').fadeIn(1000, function() {
	            	$('#error').html('<div class="alert alert-danger">' + response + '!</div>');
	                $('#btn-login').html('Se connecter');
	            });
	        }
		},
		fail : function (err){
		}
	});
	return false;
}