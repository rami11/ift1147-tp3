//requ�tes films
function enregistrer(){
	var formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append('action','enregistrer');
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		dataType : 'json', //text pour le voir en format de string
		//async : false,
		//cache : false,
		contentType : false,
		processData : false,
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
		},
		fail : function (err){
		   
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

function enlever(){
	var leForm=document.getElementById('formEnlever');
	var formFilm = new FormData(leForm);
	formFilm.append('action','enlever');//alert(formFilm.get("action"));
	$.ajax({
		type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//leForm.serialize(),
		contentType : false, //Enlever ces deux directives si vous utilisez serialize()
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
					filmsVue(reponse);
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