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
				closeDialog('#modal-login');
	        } else {
	            showErrorMessage('#error-modal-login', response.msg);
	            $('#btn-login').html('Se connecter');
	        }
		},
		fail : function (err) {
		}
	});
	return false;
}

function registerButtonClicked() {
	var formData = $("#form-register").serialize();

	$.ajax({
		type : 'POST',
		url : 'users/registerController.php',
		data : formData,
		dataType: 'json',
		beforeSend: function() {
			$("#btn-register").html('Envoyer...');
		},
		success : function (response) {
			console.log(response);
			if(response.success) {
				//closeDialog('#modal-register');
				toggleDialog('#modal-register');
				location.reload();
	        } else {
	     		displayErrorMessages('#error-modal-register', response.msg);
	            $('#btn-register').html('Inscrire');
	        }
		},
		fail : function (err) {
		}
	});
	return false;
}
