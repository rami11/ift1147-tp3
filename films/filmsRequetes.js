//requ�tes films
function addFilm() {
	var formFilm = new FormData(document.getElementById('form-add-film'));
	formFilm.append('action', 'enregistrer');
	$.ajax({
		type: 'POST',
		url: 'films/filmsControleur.php',
		data: formFilm,
		dataType: 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType: false,
		processData: false,
		success: function (response) {
			console.log(response);

			if (response.success) {
				toggleDialog('#modal');
				showMessage(response);
				//showAddedFilm(response.film);
				location.reload();

			} else if (!response.success) {
				showErrorMessage('#error-add-film-dialog', response.msg);
			}
		},
		fail: function (err) {
		}
	});
}

// function lister() {
// 	var formFilm = new FormData();
// 	formFilm.append('action', 'lister');//alert(formFilm.get("action"));
// 	$.ajax({
// 		type: 'POST',
// 		url: 'films/filmsControleur.php',
// 		data: formFilm,
// 		contentType: false,
// 		processData: false,
// 		dataType: 'json', //text pour le voir en format de string
// 		success: function (reponse) {
// 			//alert(reponse);
// 			filmsVue(reponse);
// 		},
// 		fail: function (err) {
// 		}
// 	});
// }

// function showCategories() {
// 	var formFilm = new FormData();
// 	formFilm.append('action', 'listerCategories');//alert(formFilm.get("action"));
// 	//console.log("show cat"+formFilm.action);
// 	$.ajax({
// 		type: 'POST',
// 		url: 'films/filmsControleur.php',
// 		data: formFilm,
// 		contentType: false,
// 		processData: false,
// 		dataType: 'json', //text pour le voir en format de string
// 		success: function (reponse) {
// 			//alert(reponse);
// 			//listCategories(reponse);
// 			filmsVue(reponse);
// 		},
// 		fail: function (err) {
// 		}
// 	});
// }

function deleteFilm(id) {

	$.ajax({
		type: 'POST',
		url: 'films/filmsControleur.php',
		data: { 'id': id, 'action': 'enlever' },
		dataType: 'json',
		success: function (response) {

			if (response.success) {
				console.log(response);
				showMessage(response);
				//location.reload();
				hideDeletedFilm(response.id);

			} else {
				showMessage(response);
			}

		},
		fail: function (err) {
		}
	});
}


function obtenirFiche(id) {
	$.ajax({
		type: 'POST',
		url: 'films/filmsControleur.php',
		data: {'id': id, 'action': 'fiche'},
		dataType: 'json',
		success: function (reponse) {
			console.log(reponse);
			afficherFiche(reponse);
		},
		fail: function (err) {
		}
	});
}

function updateFilm() {
	var form = document.getElementById('form-update-film');
	var filmForm = new FormData(form);
	filmForm.append('action', 'modifier');
	//filmForm.append('id', id);
	$.ajax({
		type: 'POST',
		url: 'films/filmsControleur.php',
		data: filmForm,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function (response) {
			console.log(response);
			// $('#divFormFiche').hide();
			// filmsVue(response);
			if (response.success) {
				toggleDialog('#modal-update-film');
				showMessage(response);
				updateFilmRow(response.film);

			} else if (!response.success) {
				// showErrorMessage('#error-update-film-dialog', response.msg);
				displayErrorMessages('#error-update-film-dialog', response.msg);
			}
		},
		fail: function (err) {
		}
	});

}