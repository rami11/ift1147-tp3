//vue films
// function listerF(listFilms) {
//   rep = '<div style="margin: 10px; position: relative;">';
//   // rep+='<div>';
//   //   rep+='<h4 style="color: #218838">Liste des films</h4>';
//   // rep+='</div>';
//   rep += '<div style="margin-top: 10px">';
//   rep += '<button class="btn btn-success" data-toggle="modal" data-target="#modal">Ajouter</button>';
//   rep += '</div>';
//   rep += '</div>';
//   rep += '<table class="table table-striped" style="">';
//   rep += '<thead>';
//   rep += '<tr>';
//   rep += '<th scope="col">Pochette</th>';
//   rep += '<th scope="col">Titre</th>';
//   rep += '<th scope="col">Réalisateur</th>';
//   rep += '<th scope="col">Catégorie</th>';
//   rep += '<th scope="col">Durée</th>';
//   rep += '<th scope="col">Prix</th>';
//   rep += '<th scope="col">Gestion</th>';
//   rep += '</tr>';
//   rep += '</thead>';
//   rep += '<tbody>';
//   listFilms.forEach(function (film) {
//     rep += '<tr>';
//     rep += '<td scope="row"><img src="img/' + film.image + '" style="width:50px; height: 55px;" /></td>';
//     rep += '<td>' + film.title + '</td>';
//     rep += '<td>' + film.director + '</td>';
//     rep += '<td>' + film.category + '</td>';
//     rep += '<td>' + film.duration + '</td>';
//     rep += '<td>' + film.price + '</td>';
//     rep += '<td>';
//     rep += '<a class="btn btn-success btn-sm" href="viewsfilms/updateForm.php?id=<?php echo $film->getId(); ?>">Modifier</a> ';
//     rep += '<button class="btn btn-danger btn-sm" onclick="deleteFilm(' + film.id + ')" ?>Supprimer</button>';
//     rep += '</td>';
//     rep += '</tr>';
//   });
//   rep += '</tbody>';
//   rep += '</table>';

//   $('#view-admin').html(rep);
// }

// function listerC(listCategories) {
//   rep = '';
//   listCategories.forEach(function (category) {
//     rep += '<a class="dropdown-item" href="index.php?category=XXX">' + category.name + '</a>';
//   });

//   $('#dropdown-categories').html(rep);
// }

// function afficherFiche(reponse) {
//   var uneFiche;
//   if (reponse.OK) {
//     uneFiche = reponse.fiche;
//     $('#formFicheF h3:first-child').html("Fiche du film numero " + uneFiche.idf);
//     $('#idf').val(uneFiche.idf);
//     $('#titreF').val(uneFiche.titre);
//     $('#dureeF').val(uneFiche.duree);
//     $('#resF').val(uneFiche.res);
//     $('#divFormFiche').show();
//     document.getElementById('divFormFiche').style.display = 'block';
//   } else {
//     $('#messages').html("Film " + $('#numF').val() + " introuvable");
//     setTimeout(function () { $('#messages').html(""); }, 5000);
//   }

// }

function afficherFiche(reponse) {
  var uneFiche;
  if (reponse.success) {
    uneFiche = reponse.film;

    $('#film-id').val(uneFiche.id);
    $('#title').val(uneFiche.title);
    $('#director').val(uneFiche.director);
    $('#category').val(uneFiche.category);
    $('#duration').val(uneFiche.duration);
    $('#price').val(uneFiche.price);

    toggleDialog("#modal-update-film");
  }
}

function showMessage(response) {
  $('#message').show();
  $( "#message" ).fadeIn( "slow", function() {
    $('#message').html(response.msg);
  });

  $( "#message" ).fadeOut(5000, function() {
    $('#message').hide();
  }); 
}

function showErrorMessage(id, msg) {
  rep = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
  rep += msg;
  rep += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
  rep += '<span aria-hidden="true">&times;</span>';
  rep += '</button>';
  rep += '</div>';
  $(id).html(rep);
  $(id).show();
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

function showAddedFilm(film) {

  rep = '<td scope="row"><img src="img/' + film.image + '" style="width:50px; height: 55px;" /></td>';
  rep += '<td>' + film.title + '</td>';
  rep += '<td>' + film.director + '</td>';
  rep += '<td>' + film.category + '</td>';
  rep += '<td>' + film.duration + '</td>';
  rep += '<td>' + film.price + '</td>';
  rep += '<td>';
  rep += '<a class="btn btn-success btn-sm" href="viewsfilms/updateForm.php?id=">Modifier</a>';
  rep += ' <button class="btn btn-danger btn-sm" onclick="deleteFilm('+ film.id +')">Supprimer</button>';
  rep += '</td>';

  $('#row-film').html(rep);
  $('#row-film').show();
}

function hideDeletedFilm(id) {
    $('#'+id).hide();
}

function updateFilmRow(film) {
  var id = film.id;

  $('#image-'+id).html("img/" + film.image);
  $('#title-'+id).html(film.title);
  $('#director-'+id).html(film.director);
  $('#category-'+id).html(film.category);
  $('#price-'+id).html(film.price);
}

var filmsVue = function (reponse) {
  var action = reponse.action;
  switch (action) {
    case "enregistrer":
    case "enlever":
    case "modifier":
      $('#messages').html(reponse.msg);
      //setTimeout(function () afficherFiche{ $('#messages').html(""); }, 5000);
      break;afficherFiche
    case "lister":afficherFiche
      listerF(reponse.listeFiafficherFichelms);
      break;afficherFiche
    case "listerCategories":afficherFiche
      listerC(reponse.listCatafficherFicheegories);
      break;
    case "fiche":
      afficherFiche(reponse);
      break;

  }
}

