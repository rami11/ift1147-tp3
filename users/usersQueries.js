function loginButtonClicked() {
	var formData = $("#form-login").serialize();

	$.ajax({
		type : 'POST',
		url : 'users/loginController.php',
		data : formData,
		beforeSend: function() {	
			$("#error").fadeOut();
			$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending ...');
		},
		success : function (response){
			if(response == "ok") {
	            $("#btn-login").html('Signing In ...');
	            setTimeout(' window.location.href = "../index.php"; ',1000);
	        } else{
	            $("#error").fadeIn(1000, function(){
	            	$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
	                $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
	            });
	        }
		},
		fail : function (err){
		}
	});
	return false;
}