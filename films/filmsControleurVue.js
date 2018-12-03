//vue films
function listerF(listFilms){
	rep='<div style="margin: 10px; position: relative;">';
    rep+='<div>';
      rep+='<h4 style="color: #218838">Liste des films</h4>';
    rep+='</div>';
    rep+='<div>';
      rep+='<a class="btn btn-success" href="viewsfilms/film.php">Ajouter</a>';
    rep+='</div>';
  rep+='</div>';
  rep+='<table class="table table-striped" style="">';
    rep+='<thead>';
      rep+='<tr>';
        rep+='<th scope="col">Pochette</th>';
        rep+='<th scope="col">Titre</th>';
        rep+='<th scope="col">Réalisateur</th>';
        rep+='<th scope="col">Catégorie</th>';
        rep+='<th scope="col">Durée</th>';
        rep+='<th scope="col">Prix</th>';
        rep+='<th scope="col">Gestion</th>';
      rep+='</tr>';
    rep+='</thead>';
    rep+='<tbody>';
      listFilms.forEach(function(film) {
      	rep+='<tr>';
          rep+='<td scope="row"><img src="img/' +  film.image +'" style="width:50px; height: 55px;" /></td>';
          rep+='<td>' + film.title + '</td>';
          rep+='<td>' + film.director + '</td>';
          rep+='<td>' + film.category + '</td>';
          rep+='<td>' + film.duration + '</td>';
          rep+='<td>' + film.price + '</td>';
          rep+='<td>';
            rep+='<a class="btn btn-success btn-sm" href="viewsfilms/updateForm.php?id=<?php echo $film->getId(); ?>">Modifier</a> ';
            rep+='<a class="btn btn-danger btn-sm" href="viewsfilms/deleteFilm.php?id=<?php echo $film->getId(); ?>">Supprimer</a>';
          rep+='</td>';
        rep+='</tr>';
      });
    rep+='</tbody>';
  rep+='</table>';
	
	$('#view-admin').html(rep);
}

function listerC(listCategories) {
	rep = '';
	listCategories.forEach(function(category) {
		rep+= '<a class="dropdown-item" href="index.php?category=XXX">' + category.name + '</a>';
	});

	$('#dropdown-categories').html(rep);
}

function afficherFiche(reponse){
  var uneFiche;
  if(reponse.OK){
	uneFiche=reponse.fiche;
	$('#formFicheF h3:first-child').html("Fiche du film numero "+uneFiche.idf);
	$('#idf').val(uneFiche.idf);
	$('#titreF').val(uneFiche.titre);
	$('#dureeF').val(uneFiche.duree);
	$('#resF').val(uneFiche.res);
	$('#divFormFiche').show();
	document.getElementById('divFormFiche').style.display='block';
  }else{
	$('#messages').html("Film "+$('#numF').val()+" introuvable");
	setTimeout(function(){ $('#messages').html(""); }, 5000);
  }

}

var filmsVue=function(reponse){
	var action=reponse.action; 
	switch(action){
		case "enregistrer" :
		case "enlever" :
		case "modifier" :
			$('#messages').html(reponse.msg);
			setTimeout(function(){ $('#messages').html(""); }, 5000);
		break;
		case "lister" :
			listerF(reponse.listeFilms);
		break;
		case "listerCategories" :
			listerC(reponse.listCategories);
			break;
		case "fiche" :
			afficherFiche(reponse);
		break;
		
	}
}
