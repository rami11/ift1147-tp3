function closeDialog(id) {
	$(function () {
	   	$(id).modal('toggle');
	});
	location.reload();
}

function toggleDialog(id) {
	$(function () {
		$(id).modal('toggle');
	});
}

function displayErrorMessages(id, messages) {
	rep = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
	messages.forEach(function(message) {
    	rep += message + '<br>';
	});
  //rep += messages;
  rep += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
  rep += '<span aria-hidden="true">&times;</span>';
  rep += '</button>';
  rep += '</div>';
  $(id).html(rep);
  $(id).show();
}

//lister();

//showCategories();
//Cas d'un button
/*
function valider(){
	var formEnreg=document.getElementById('formEnreg');
	var num=document.getElementById('num').value;
	var titre=document.getElementById('titre').value;
	var duree=document.getElementById('duree').value;
	var res=document.getElementById('res').value;
	var numRegExp=new RegExp("^[0-9]{1,4}$");
	if(num!="" && titre!="" && duree!="" && res!="")
		if(numRegExp.test(num))
			formEnreg.submit();
}
*/