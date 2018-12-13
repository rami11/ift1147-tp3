//requêtes films
function addFilm(){
	var formFilm = new FormData(document.getElementById('form-add-film'));
	formFilm.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function(response) {
			console.log(response);

			if (response.success) {
				toggleDialog('#modal');
				showMessage(response);
				showAddedFilm(response.film);
				
			} else if (!response.success) {
				showErrorMessage('#error-add-film-dialog', response.msg);
			}
		},
		fail : function(err) { 
		}
	});
}

function lister(){
	var formFilm = new FormData();
	formFilm.append('action','lister');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			//alert(reponse);
			filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function showCategories(){
	var formFilm = new FormData();
	formFilm.append('action','listerCategories');//alert(formFilm.get("action"));
	//console.log("show cat"+formFilm.action);
	$.ajax({
		type : 'POST',
		url : 'films/filmsControleur.php',
		data : formFilm,
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			//alert(reponse);
			//listCategories(reponse);
			filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function deleteFilm(id){
	// var formData = new FormData();
	// formData.append('action','enlever');
	// formData.append('id', id);
	
	$.ajax({
		type : 'POST',
		url : 'films/filmsControleur.php',
		data :  {'id': id, 'action': 'enlever'}, //formData,//leForm.serialize(),
		//contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		//processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (response){//alert(reponse);
			//filmsVue(reponse);
			console.log(response);
			// if (response.success == true) {
			// 	$('#message').html(
			// 		'<div class="alert alert-success alert-dismissible fade show" role="alert">' +
			//        response.msg +
			//       		'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
			//         		'<span aria-hidden="true">&times;</span>' +
			//       		'</button>' +
			//     	'</div>');

			// 	lister();
			// }
			showMessage(response);

		},
		fail : function (err){
		}
	});
}


function obtenirFiche(){
	$('#divFiche').hide();
	var leForm=document.getElementById('formFiche');
	var formFilm = new FormData(leForm);
	formFilm.append('action','fiche');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});
}

function modifier(){
	var leForm=document.getElementById('formFicheF');
	var formFilm = new FormData(leForm);
	formFilm.append('action','modifier');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json', 
		success : function (reponse){//alert(reponse);
					$('#divFormFiche').hide();
					filmsVue(reponse);
		},
		fail : function (err){
		}
	});

}